<?php

namespace App\Http\Controllers;

use App\Models\DataAlternatifModel;
use App\Models\DataKriteriaModel;
use Illuminate\Http\Request;
use App\Models\DataPenilaianModel;
use Yajra\DataTables\Facades\DataTables;

class MOORAController extends Controller
{
    public function index() {
        $page = (object) [
            'title' => 'Perhitungan Metode MOORA Bantuan Sosial',
        ];

        $activeMenu = 'data_perhitungan_moora';
        $dropdown = 'd_bansos';

        $kriteria = DataKriteriaModel::all();
        $alternatif = DataAlternatifModel::with('penilaians')->get();
        $dataMatriks = $this->displayMatriks();
        $normalizationMatrix = $this->normalizeMatrix($dataMatriks);
        $weightedMatrix = $this->weightMatrix($normalizationMatrix, $kriteria);
        $optimizationMatrix = $this->optimizeMatrix($weightedMatrix, $kriteria);
        $dataRank = $this->rank($optimizationMatrix);

        return view('admin.data_perhitungan.moora', [
            'page' => $page,
            'activeMenu' => $activeMenu,
            'dropdown' => $dropdown,
            'kriteria' => $kriteria,
            'alternatif' => $alternatif,
            'dataMatriks' => $dataMatriks,
            'normalizationMatrix' => $normalizationMatrix,
            'weightedMatrix' => $weightedMatrix,
            'optimizationMatrix' => $optimizationMatrix,
            'dataRank' => $dataRank
        ]);
    }

    public function displayMatriks() {
        $kriteria = DataKriteriaModel::all();
        $alternatif = DataAlternatifModel::with('penilaians')->get();

        $dataMatriks = $alternatif->map(function($alt) use ($kriteria) {
            $penilaianData = $kriteria->map(function($krit) use ($alt) {
                $penilaian = $alt->penilaians()->where('id_kriteria', $krit->id_kriteria)->first();
                return [
                    'id_kriteria' => $krit->id_kriteria,
                    'nilai' => $penilaian ? $penilaian->nilai : null
                ];
            });

            return [
                'id_alternatif' => $alt->id_alternatif,
                'penilaians' => $penilaianData
            ];
        });

        return $dataMatriks;
    }

    public function normalizeMatrix($dataMatriks) {
        $normalizationMatrix = [];

        foreach ($dataMatriks as $alt) {
            $penilaianData = [];
            foreach ($alt['penilaians'] as $penilaian) {
                $sumSquares = array_reduce($dataMatriks->pluck('penilaians')->flatten(1)->toArray(), function($carry, $item) use ($penilaian) {
                    return $carry + ($item['id_kriteria'] === $penilaian['id_kriteria'] ? pow($item['nilai'], 2) : 0);
                }, 0);
                $normalizedValue = $sumSquares ? $penilaian['nilai'] / sqrt($sumSquares) : 0;

                $penilaianData[] = [
                    'id_kriteria' => $penilaian['id_kriteria'],
                    'nilai' => $normalizedValue
                ];
            }

            $normalizationMatrix[] = [
                'id_alternatif' => $alt['id_alternatif'],
                'penilaians' => $penilaianData
            ];
        }

        return $normalizationMatrix;
    }

    public function weightMatrix($normalizationMatrix, $kriteria) {
        $weightedMatrix = [];

        foreach ($normalizationMatrix as $alt) {
            $penilaianData = [];
            foreach ($alt['penilaians'] as $penilaian) {
                $weight = $kriteria->where('id_kriteria', $penilaian['id_kriteria'])->first()->bobot;
                $weightedValue = $penilaian['nilai'] * $weight;

                $penilaianData[] = [
                    'id_kriteria' => $penilaian['id_kriteria'],
                    'nilai' => $weightedValue
                ];
            }

            $weightedMatrix[] = [
                'id_alternatif' => $alt['id_alternatif'],
                'penilaians' => $penilaianData
            ];
        }

        return $weightedMatrix;
    }

    public function optimizeMatrix($weightedMatrix, $kriteria) {
        $optimizationMatrix = [];

        foreach ($weightedMatrix as $alt) {
            $positiveSum = 0;
            $negativeSum = 0;

            foreach ($alt['penilaians'] as $penilaian) {
                $kriteriaType = $kriteria->where('id_kriteria', $penilaian['id_kriteria'])->first()->jenis;
                if ($kriteriaType === 'Benefit') {
                    $positiveSum += $penilaian['nilai'];
                } else {
                    $negativeSum += $penilaian['nilai'];
                }
            }

            $optimizationValue = $positiveSum + $negativeSum;

            $optimizationMatrix[] = [
                'id_alternatif' => $alt['id_alternatif'],
                'optimization_value' => $optimizationValue
            ];
        }

        return $optimizationMatrix;
    }

    public function rank($optimizationMatrix) {
        $rankedMatrix = $optimizationMatrix;

        usort($rankedMatrix, function($a, $b) {
            return $b['optimization_value'] <=> $a['optimization_value'];
        });

        $rank = 1;
        $nama_alternatif = DataAlternatifModel::all();
        foreach ($rankedMatrix as &$alternative) {
            $alternative['rank'] = $rank++;
            // $alternative['nama_alternatif'] = $nama_alternatif[$alternative['id_alternatif'] - 1]->nama_alternatif;
            $alternative['nama_alternatif'] = isset($nama_alternatif[$alternative['id_alternatif'] - 1]) ? $nama_alternatif[$alternative['id_alternatif'] - 1]->nama_alternatif : '';
        }

        return $rankedMatrix;
    }
}

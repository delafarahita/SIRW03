<?php

namespace App\Http\Controllers;

use App\Models\DataAlternatifModel;
use App\Models\DataKriteriaModel;
use Illuminate\Http\Request;
use App\Models\DataPenilaianModel;
use Yajra\DataTables\Facades\DataTables;

class DataPerhitunganController extends Controller
{
    public function index() {
        $page = (object) [
            'title' => 'Perhitungan Metode Edas Bantuan Sosial',
        ];

        $activeMenu = 'data_perhitungan';
        $dropdown = 'd_bansos';

        $kriteria = DataKriteriaModel::all();
        $alternatif = DataAlternatifModel::with('penilaians')->get();
        $dataBobot = $this->getCriteriaWeights();
        $dataMatriks = $this->displayMatriks();
        $dataAvg = $this->calculateAvgSolution();
        $dataPDA = $this->calculatePDA();
        $dataNDA = $this->calculateNDA();
        $dataSP = $this->calculateSP($dataPDA, $dataBobot);
        $dataSN = $this->calculateSN($dataNDA, $dataBobot);
        $dataNSP = $this->calculateNSP($dataSP);
        $dataNSN = $this->calculateNSN($dataSN);
        $dataAS = $this->calculateAS($dataNSP, $dataNSN);
        $dataRank = $this->rank($dataAS);
        

        return view('admin.data_perhitungan.index', [
            'page' => $page,
            'activeMenu' => $activeMenu,
            'dropdown' => $dropdown,
            'kriteria' => $kriteria,
            'alternatif' => $alternatif,
            'dataMatriks' => $dataMatriks,
            'dataAvg' => $dataAvg,
            'dataPDA' => $dataPDA,
            'dataNDA' => $dataNDA,
            'dataSP' => $dataSP,
            'dataSN' => $dataSN,
            'dataNSP' => $dataNSP,
            'dataNSN' => $dataNSN,
            'dataAS' => $dataAS,
            'dataRank' => $dataRank
        ]);
    }

    public function getCriteriaWeights()
    {
        $kriteria = DataKriteriaModel::all(['id_kriteria', 'bobot']);

        $bobot = $kriteria->map(function ($item) {
            return [
                'id_kriteria' => $item->id_kriteria,
                'bobot' => $item->bobot,
            ];
        })->toArray();

        return $bobot;
    }

    public function displayMatriks(){
        $kriteria = DataKriteriaModel::all();
        $alternatif = DataAlternatifModel::with('penilaians')->get();

        // Siapkan data yang akan dikirim ke view
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

    public function calculateAvgSolution()
    {
        $alternatif = DataAlternatifModel::with('penilaians')->get();
        $kriteria = DataKriteriaModel::all();
        $jumlahAlternatif = $alternatif->count();
        $dataAvg = [];

        foreach ($kriteria as $krit) {
            $totalNilai = 0;

            foreach ($alternatif as $alt) {
                $penilaian = $alt->penilaians()->where('id_kriteria', $krit->id_kriteria)->first();
                $nilai = $penilaian ? $penilaian->nilai : 0;
                $totalNilai += $nilai;
            }

            $rataRataNilai = $totalNilai / $jumlahAlternatif;

            $dataAvg[] = [
                'id_kriteria' => $krit->id_kriteria,
                'totalNilai' => $totalNilai,
                'rataRataNilai' => $rataRataNilai
            ];
        }

        return $dataAvg;
    }

    public function calculatePDA()
    {
        $dataMatriks = $this->displayMatriks();
        $dataAvg = $this->calculateAvgSolution();
        $dataPDAMatrix = [];

        foreach ($dataMatriks as $matriksData) {
            $penilaianData = [];
            foreach ($matriksData['penilaians'] as $penilaian) {
                $avgValue = null;
                foreach ($dataAvg as $avgData) {
                    if ($avgData['id_kriteria'] === $penilaian['id_kriteria']) {
                        $avgValue = $avgData['rataRataNilai'];
                        break;
                    }
                }

                $nilai = $penilaian['nilai'] ? $penilaian['nilai'] - $avgValue : null;

                if ($avgValue == 0) {
                    $nilaiPembagian = null;
                    $nilaiPDA = null;
                } else {
                    $nilaiPembagian = $nilai !== null ? $nilai / $avgValue : null;
                    $nilaiPDA = max(0, $nilaiPembagian);
                }

                $penilaianData[] = [
                    'id_kriteria' => $penilaian['id_kriteria'],
                    'nilai' => $nilaiPDA
                ];
            }

            $dataPDAMatrix[] = [
                'id_alternatif' => $matriksData['id_alternatif'],
                'penilaians' => $penilaianData
            ];
        }

        return $dataPDAMatrix;
    }
    
    // $nilai = $penilaian['nilai'] ? $avgValue - $penilaian['nilai'] : null;

    public function calculateNDA(){
        $dataMatriks = $this->displayMatriks();
        $dataAvg = $this->calculateAvgSolution();
        $dataNDAMatrix = [];

        foreach ($dataMatriks as $matriksData) {
            $penilaianData = [];
            foreach ($matriksData['penilaians'] as $penilaian) {
                $avgValue = null;
                foreach ($dataAvg as $avgData) {
                    if ($avgData['id_kriteria'] === $penilaian['id_kriteria']) {
                        $avgValue = $avgData['rataRataNilai'];
                        break;
                    }
                }

                $nilai = $penilaian['nilai'] ? $avgValue - $penilaian['nilai']: null;

                if ($avgValue == 0) {
                    $nilaiPembagian = null;
                    $nilaiNDA = null;
                } else {
                    $nilaiPembagian = $nilai !== null ? $nilai / $avgValue : null;
                    $nilaiNDA = max(0, $nilaiPembagian);
                }

                $penilaianData[] = [
                    'id_kriteria' => $penilaian['id_kriteria'],
                    'nilaiPengurangan' => $nilai,
                    'nilai' => $nilaiNDA
                ];
            }

            $dataNDAMatrix[] = [
                'id_alternatif' => $matriksData['id_alternatif'],
                'penilaians' => $penilaianData
            ];
        }

        return $dataNDAMatrix;
    }
    
    public function calculateSP($dataPDAMatrix, $criteriaWeights)
    {
        $weightedMatrix = [];

        foreach ($dataPDAMatrix as $pdaData) {
            $weightedPenilaians = [];
            $sum_weightedValue = 0;
            foreach ($pdaData['penilaians'] as $penilaian) {
                $weightedValues = [];
                $multiplySP = 0;
                foreach ($criteriaWeights as $weight) {
                    if ($weight['id_kriteria'] === $penilaian['id_kriteria']) {
                        $multiplySP = $penilaian['nilai'] * $weight['bobot'];
                        $weightedValues[] = $multiplySP;
                        $sum_weightedValue += $multiplySP;
                        break;
                    }
                }

                $weightedPenilaians[] = [
                    'id_kriteria' => $penilaian['id_kriteria'],
                    'nilai' => $multiplySP,
                    'sum_weightValue' => $sum_weightedValue
                ];
            }

            $weightedMatrix[] = [
                'id_alternatif' => $pdaData['id_alternatif'],
                'penilaians' => $weightedPenilaians,
                'sum_weightedValue' => $sum_weightedValue
            ];
        }

        return $weightedMatrix;
    }

    public function calculateSN($dataNDAMatrix, $criteriaWeights)
    {
        $SNweightedMatrix = [];

        foreach ($dataNDAMatrix as $ndaData) {
            $weightedPenilaians = [];
            $sum_weightedValue = 0;
            foreach ($ndaData['penilaians'] as $penilaian) {
                $weightedValues = [];
                $multiplySP = 0;
                foreach ($criteriaWeights as $weight) {
                    if ($weight['id_kriteria'] === $penilaian['id_kriteria']) {
                        $multiplySP = $penilaian['nilai'] * $weight['bobot'];
                        $weightedValues[] = $multiplySP;
                        $sum_weightedValue += $multiplySP;
                        break;
                    }
                }

                $weightedPenilaians[] = [
                    'id_kriteria' => $penilaian['id_kriteria'],
                    'nilai' => $multiplySP,
                    'sum_weightValue' => $sum_weightedValue
                ];
            }

            $SNweightedMatrix[] = [
                'id_alternatif' => $ndaData['id_alternatif'],
                'penilaians' => $weightedPenilaians,
                'sum_weightedValue' => $sum_weightedValue
            ];
        }

        return $SNweightedMatrix;
    }

    public function calculateNSP($dataSP)
    {
        $nspMatrix = [];

        foreach ($dataSP as $alternative) {
            // Find the maximum SP value for the current alternative
            $maxSP = max(array_column($dataSP, 'sum_weightedValue'));

            $divisionPenilaians = [];
            foreach ($alternative['penilaians'] as $penilaian) {
                // Calculate the division of SP value by the maximum sum of weighted values
                $divisionValue = ($maxSP != 0) ? $penilaian['sum_weightValue'] / $maxSP : 0;

                $divisionPenilaians[] = [
                    'id_kriteria' => $penilaian['id_kriteria'],
                    'nilai' => $divisionValue
                ];
            }

            $nspMatrix[] = [
                'id_alternatif' => $alternative['id_alternatif'],
                // 'penilaians' => $divisionPenilaians,
                'sum_NSP' => $divisionValue,
                'max_sp' => $maxSP
            ];
        }

        return $nspMatrix;
    }

    public function calculateNSN($dataSN)
    {
        $nsnMatrix = [];

        foreach ($dataSN as $alternative) {
            // Find the maximum SP value for the current alternative
            $maxSP = max(array_column($dataSN, 'sum_weightedValue'));

            $divisionPenilaians = [];
            foreach ($alternative['penilaians'] as $penilaian) {
                // Calculate the division of SP value by the maximum sum of weighted values
                $divisionValue = ($maxSP != 0) ? $penilaian['sum_weightValue'] / $maxSP : 0;
                
                $divisionPenilaians[] = [
                    'id_kriteria' => $penilaian['id_kriteria'],
                    'nilai' => $divisionValue
                ];
            }

            $nsnMatrix[] = [
                'id_alternatif' => $alternative['id_alternatif'],
                // 'penilaians' => $divisionPenilaians,
                'sum_NSN' => $divisionValue,
                'max_sp' => $maxSP
            ];
        }

        return $nsnMatrix;
    }

    public function calculateAS($nspMatrix, $nsnMatrix) {
        $asMatrix = [];

        // Iterate over both NSP and NSN matrices simultaneously
        foreach ($nspMatrix as $nspKey => $nspAlternative) {
            $nsnAlternative = $nsnMatrix[$nspKey]; // Access corresponding NSN alternative

            // Check if both alternatives have the same ID
            if ($nspAlternative['id_alternatif'] == $nsnAlternative['id_alternatif']) {
                // Combine NSP and NSN values
                $combinedValue = 0.5*($nspAlternative['sum_NSP'] + $nsnAlternative['sum_NSN']);
                
                
                // Add the combined value to the combined matrix
                $asMatrix[] = [
                    'id_alternatif' => $nspAlternative['id_alternatif'],
                    'combined_value' => $combinedValue
                ];
            } else {
                // Handle the case where IDs do not match (shouldn't happen in well-formed data)
                // You may want to log an error or handle this case differently based on your application's requirements
            }
        }

        return $asMatrix;
    }

    public function rank($asMatrix){
        $rankedMatrix = $asMatrix;

        // Sort the rankedMatrix based on the 'combined_value' in descending order
        usort($rankedMatrix, function($a, $b) {
            return $b['combined_value'] <=> $a['combined_value'];
        });

        // Add ranks to the sorted matrix
        $rank = 1;
        foreach ($rankedMatrix as &$alternative) {
            $alternative['rank'] = $rank++;
        }

        return $rankedMatrix;
    }
}

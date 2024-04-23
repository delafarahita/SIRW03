<h1>Keluhan Anda</h1>

<p>{{ $keluhan->keluhan }}</p>

@if($keluhan->is_private)
    <p><em>Keluhan ini bersifat pribadi dan hanya bisa dilihat oleh Anda.</em></p>
@else
    <p><strong>Balasan:</strong> {{ $keluhan->reply ?? 'Menunggu balasan' }}</p>
@endif

<form action="{{ route('keluhan.reply', $keluhan->id) }}" method="POST">
    @csrf
    <textarea name="reply" rows="5" cols="50" required></textarea><br><br>
    <button type="submit">Balas Keluhan</button>
</form>

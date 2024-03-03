@extends('master')
@section('konten')
    <!DOCTYPE html>
    <html>

    <head>
        <title>Nilai</title>
        <link rel="stylesheet" href="css/nilai.css">

    </head>

    <body>
        <h2>Data Nilai</h2>
        <br />
        <table class="table table-dark table-hover m-lg-2">
            <tr>
                <th>ID Soal</th>
                <th>ID User</th>
                <th>Jawaban Tugas</th>
                <th>Nilai</th>
                <th>Status</th>
            </tr>
            @foreach ($nilai as $n)
                <tr>
                    <td> {{ $n->idsoal }} </td>
                    <td> {{ $n->name }} </td>
                    <td> {{ $n->jawabansoal }} </td>
                    <td> {{ $n->nilai }} </td>
                    <td>
                        @if (Auth::user()->role == 'guru')
                            @if ($n->status != 'selesai')
                                <button class="" style="--clr:#8A2BE2" data-toggle="modal"
                                    data-target="#UpdateStatus{{ $n->idnilai }}">

                                    <span>{{ $n->status }}</span><i></i>
                                </button>
                            @elseif($n->status == 'selesai')
                                <button class="" style="--clr:#32cd32">
                                    <span>{{ $n->status }}</span><i></i>
                                </button>
                            @endif
                        @else
                            @if ($n->status != 'selesai')
                            <button class="" style="--clr:#ff0800"
                            >

                            <span>{{ $n->status }}</span><i></i>
                            @elseif($n->status == 'selesai')
                                <button class="" style="--clr:#32cd32">
                                    <span>{{ $n->status }}</span><i></i>
                                </button>
                            @endif
                        @endif
                    </td>
                </tr>
                <!-- Ini tampil form update Status -->
                <div class="modal fade" id="UpdateStatus{{ $n->idnilai }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">

                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Update Status</h1>

                            </div>
                            <div class="modal-body">
                                <form action="/nilai/storeupdate" method="post" class="form-floating">

                                    @csrf
                                    <input type="hidden" name="idnilai" id="idnilai" readonly class="form-control"
                                        value="{{ $n->idnilai }}">

                                    <div class="form-floating">
                                        <label for="floatingInputValue">Nilai

                                            Tugas</label>

                                        <input type="text" name="nilai" required="required" class="form-control"
                                            value="{{ $n->nilai }}">

                                    </div>
                                    <div class="modal-footer">

                                        <button type="button" class=""  style="--clr:#a9a9a9" data-dismiss="modal"><span>Close</span><i></i></button>

                                        <button type="submit" class=""  style="--clr:#32cd32"><span>Save Updates</span><i></i></button>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </table>
        </div>
    </body>

    </html>
@endsection

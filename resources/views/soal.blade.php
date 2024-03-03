@extends('master')
@section('konten')
    <!DOCTYPE html>
    <html>

    <head>
        <title>Tugas</title>
        <link rel="stylesheet" href="css/soal.css">
    </head>

    <body>
        <h2>Data Tugas</h2>
        <br />
        @if (Auth::user()->role == 'guru')
            <button class="" style="--clr:#8A2BE2" data-toggle="modal" data-target="#TambahSoal"><span>Add Assignment</span><i></i></button>
        @endif
        <br>
        <br>
        <table class="table table-striped table-hover">
            <tr>
                <th>ID Tugas</th>
                <th>Judul Materi</th>
                <th>Deskripsi Tugas</th>
                <th>Deadline</th>
                <th>Option</th>
            </tr>
            @foreach ($soal as $s)
                <tr>
                    <td> {{ $s->idsoal }} </td>
                    <td> {{ $s->judulmateri }} </td>
                    <td> {{ $s->deskripsisoal }} </td>

                    <td> {{ $s->bataswaktu }} </td>
                    <td>
                        @if (Auth::user()->role == 'guru')
                            <button class="" style="--clr:#0000cd" data-toggle="modal" data-target="#EditSoal{{ $s->idsoal }}"><span>Edit</span><i></i></button>

                            |

                            <button class="" style="--clr:#e2062c" data-toggle="modal" data-target="#DelSoal{{ $s->idsoal }}"><span>Delete</span><i></i></button>

                            |
                        @endif
                        @if (Auth::user()->role == 'siswa')
                            <button class="" style="--clr:#ce2029 " data-toggle="modal" data-target="#WorkSoal{{ $s->idsoal }}"><span>Kerjakan</span><i></i></button>
                        @endif
                    </td>
                </tr>
                <!-- Ini tampil form update soal -->
                <div class="modal fade" id="EditSoal{{ $s->idsoal }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">

                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Update Tugas</h1>

                            </div>
                            <div class="modal-body">
                                <form action="/soal/storeupdate" method="post" class="form-floating">

                                    @csrf
                                    <input type="hidden" name="idsoal" id="kode" readonly class="form-control"
                                        value="{{ $s->idsoal }}">
                                    <div class="form-floating">
                                        <label for="floatingInputValue">Judul

                                            Materi</label>

                                        <input type="text" name="judulmateri" required="required" class="form-control"
                                            value="{{ $s->judulmateri }}">

                                    </div>
                                    <div class="form-floating">
                                        <label for="floatingInputValue">Deskripsi

                                            Tugas</label>

                                        <br>
                                        <textarea name="deskripsisoal" id="" cols="50" rows="10">{{ $s->deskripsisoal }}</textarea>

                                    </div>
                                    <div class="form-floating">
                                        <label for="floatingInputValue">Tenggat

                                            Waktu</label>

                                        <input type="date" name="bataswaktu" required="required" class="form-control"
                                            value="{{ $s->bataswaktu }}">

                                    </div>
                                    <div class="modal-footer">

                                        <button type="button" class="" style="--clr:#8A2BE2"
                                            data-dismiss="modal"><span>Close</span><i></i></button>

                                        <button type="submit" class="" style="--clr:#32cd32"><span>Save Updates</span><i></i></button>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Ini tampil form Kerjakan soal -->
                <div class="modal fade" id="WorkSoal{{ $s->idsoal }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">

                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Kerjakan Tugas</h1>

                            </div>
                            <div class="modal-body">
                                <form action="/nilai/storeinput" method="post" class="form-floating">

                                    @csrf
                                    <input type="hidden" name="idsoal" id="kode" readonly class="form-control"
                                        value="{{ $s->idsoal }}">
                                    <div class="form-floating">
                                        <p>Judul Materi : {{ $s->judulmateri }}</p>

                                    </div>
                                    <div class="form-floating">
                                        <p>Deskripsi Tugas : {{ $s->deskripsisoal }}</p>

                                    </div>
                                    <div class="form-floating">

                                        <p>Batas Waktu : {{ $s->bataswaktu }}</p>
                                    </div>
                                    <div class="form-floating">
                                        <label for="floatingInputValue">Jawaban</label>
                                        <br>
                                        <textarea name="jawabansoal" id="" cols="70" rows="10"></textarea>
                                    </div>
                                    <div class="modal-footer">

                                        <button type="button" class=""  style="--clr:#555555"
                                            data-dismiss="modal"><span>Close</span><i></i></button>

                                        <button type="submit" class=""  style="--clr:#32cd32"><span>Simpan Jawaban</span><i></i></button>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Ini tampil form delete soal -->
                <div class="modal fade" id="DelSoal{{ $s->idsoal }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">

                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Tugas</h1>

                            </div>
                            <div class="modal-body">
                                <form action="/soal/delete/{{ $s->idsoal }}" method="get" class="form-floating">
                                    @csrf
                                    <div>
                                        <h3>Yakin mau menghapus data <b>{{ $s->judulmateri }}</b> ?</h3>

                                    </div>
                                    <div class="modal-footer">

                                        <button type="button" class=""  style="--clr:#32cd32"
                                            data-dismiss="modal"><span>Cancel</span><i></i></button>

                                        <button type="submit" class=""  style="--clr:#ff0800"><span>Yes</span><i></i></button>

                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </table>
        <!-- Ini tampil form tambah produk -->

        <div class="modal fade" id="TambahSoal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Tugas</h1>

                    </div>
                    <div class="modal-body">
                        <form action="/soal/storeinput" method="post" class="form-floating"
                            enctype="multipart/form-data">

                            @csrf
                            <div class="form-floating">
                                <label for="floatingInputValue">Judul

                                    Materi</label>

                                <input type="text" name="judulmateri" required="required" class="form-control">

                            </div>
                            <div class="form-floating">
                                <label for="floatingInputValue">Deskripsi

                                    Tugas</label>

                                <br>
                                <textarea name="deskripsisoal" id="" cols="50" rows="10"></textarea>

                            </div>
                            <div class="form-floating">
                                <label for="floatingInputValue">Tenggat

                                    Waktu</label>

                                <input type="date" name="bataswaktu" required="required" class="form-control">

                            </div>

                            <div class="modal-footer">

                                <button type="button" class=""  style="--clr:#8A2BE2" data-dismiss="modal"><span>Close</span><i></i></button>

                                <button type="submit" class=""  style="--clr:#32cd32"><span>Save changes</span><i></i></button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>

    </html>
@endsection

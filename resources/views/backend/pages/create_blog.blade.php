@extends('backend.layout.main')
@section('container')
<div class="container-fluid py-4">
    <div class="" style="min-height:80vh;">
        <div class="row">

            <div class="col-lg-7 mb-xl-0 mb-4">
                <div class="card p-4">
                    <div class="card-header p-1">
                        <div class="row">
                            <div class="col">
                                <h6>Tambah Data</h6>
                                <p class="text-sm mb-0">
                                    <span class=" ms-1">Form tambah data.</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <form method="post" action="/store_blog" enctype="multipart/form-data" >
                            @csrf
                            <label for="Pengarang">Judul</label>
                            <div class="mb-3">
                                <input type="text" class="form-control mb-2" placeholder="Masukan Judul..."
                                    aria-label="Pengarang" name="title" value="">
                            </div>

                            
                            <label for="Pengarang">Keterangan</label>
                            <textarea name="content" class="form-control mb-2" id="" cols="30" rows="10"></textarea>

                            {{-- <label for="Pengarang">Gambar</label>
                            <div class="mb-3">
                                <input type="file" class="form-control mb-2"
                                    aria-label="Pengarang" name="gambar" value="">
                            </div> --}}
                            <div class="text-center">
                                <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
    @include('backend.partials.footer')
</div>
<script>
    var select_box_element = document.querySelector('#select_box');

    dselect(select_box_element, {
        search: true
    });

</script>
@endsection

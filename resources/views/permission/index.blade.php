@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="text-left">
            <h2>İzin (Permission) Yönetim</h2>
        </div>
        <div class="text-right mb-2">
        @can('permission.create')
            <a class="btn btn-success" href="{{ route('permission.create') }}">Yeni İzin Ekle</a>
            @endcan
        </div>
    </div>
</div>


@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif


<table class="table table-bordered">
  <tr>
     <th>No</th>
     <th>zin (Permission) Adı</th>
     <th width="280px">İşlem</th>
  </tr>
    @foreach ($permissions as $key => $permission)
    <tr class="item"  id="id-{{ $permission->id }}">
        <td>{{ ++$i }}</td>
        <td>{{ $permission->name }}</td>
        <td>
                <a class="btn btn-info" href="{{ route('permission.show',$permission->id) }}">Görüntüle</a>
            @can('permission.edit')
                <a class="btn btn-primary" href="{{ route('permission.edit',$permission->id) }}">Düzenle</a>
            @endcan
            @can('permission.destroy')
                <button class="btn btn-danger btn-default btn-squared btn-transparent-danger btndelete" data-id="{{ $permission->id }}">Sil</button>
            @endcan
        </td>
    </tr>
    @endforeach
</table>


{{ $permissions->links('vendor.pagination.bootstrap-4') }}

@endsection

@section('customjs')
    <script>

        $(document).on("click",".btndelete",function(e) {
            e.preventDefault();
            id =  $(this).attr('data-id');
                    btn =  $(this);

            alertify.confirm('Silme işlemini onaylayın!', 'Bu işlem geri alınamaz',
            function () {
                $.ajax({
                        url: "{{route('permission.destroy')}}",
                        type: 'DELETE',
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        data: { id:id },
                        success: function (response) {
                            btn.closest('.item').remove();

                           if (response.html)
                            {
                                alertify.success("Silme İşlemi Başarılı");

                            } else {
                                alertify.error("İşlem Tamamlanamadı");
                            }
                        },
                        error: function (xhr, status, error) {
                            $.each(xhr.responseJSON.errors, function (key, item) {
                                alertify.error(response.html)
                            });
                        },
                    });

            },
            function () {
                alertify.error('Silme işlemi iptal edildi')
            })

        });

    </script>
@endsection

@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Rol Yönetimi</h2>
        </div>
        <div class="text-right mb-2">
        @can('role.create')
            <a class="btn btn-success" href="{{ route('roles.create') }}">Yeni Rol Ekle</a>
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
     <th>Role Adı</th>
     <th width="280px">İşlem</th>
  </tr>
    @foreach ($roles as $key => $role)
    <tr class="item"  id="id-{{ $role->id }}">
        <td>{{ ++$i }}</td>
        <td>{{ $role->name }}</td>
        <td>
            <a class="btn btn-info" href="{{ route('roles.show',$role->id) }}">Görüntüle</a>
            @can('role.edit')
                <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Düzenle</a>
            @endcan
            @can('role.destroy')
            <button class="btn btn-danger btn-default btn-squared btn-transparent-danger btndelete" data-id="{{ $role->id }}">Sil</button>
            @endcan
        </td>
    </tr>
    @endforeach
</table>


{{ $roles->links('vendor.pagination.bootstrap-4') }}

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
                        url: "{{route('roles.destroy')}}",
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
                            alertify.error(xhr.responseJSON.message);
                        },
                    });

            },
            function () {
                alertify.error('Silme işlemi iptal edildi')
            })

        });

    </script>
@endsection

@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Kullanıcılar</h2>
        </div>
        <div class="text-right mb-2">
            <a class="btn btn-success" href="{{ route('users.create') }}">Kullanıcı Ekle</a>
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
   <th>Ad Soyad</th>
   <th>E-Posta</th>
   <th>Roller</th>
   <th width="280px">İşlem</th>
 </tr>
 @if (!empty($users))
 @foreach ($users as $key => $user)
 <tr class="item"  id="id-{{ $user->id }}">
    <td>{{ ++$i }}</td>
    <td>{{ $user->name }}</td>
    <td>{{ $user->email }}</td>
    <td>
      @if(!empty($user->roles))
        @foreach($user->getRoleNames() as $v)
           <label class="badge badge-success">{{ $v }}</label>
        @endforeach
      @endif
    </td>
    <td>
       <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Görüntüle</a>

       <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Düzenle</a>

       <button class="btn btn-danger btn-default btn-squared btn-transparent-danger btndelete" data-id="{{ $user->id }}">Sil</button>

    </td>
  </tr>
 @endforeach
 @endif
</table>


{{ $users->links('vendor.pagination.bootstrap-4') }}
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
                        url: "{{route('users.destroy')}}",
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

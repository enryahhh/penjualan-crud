<a href="{{route('barang.edit',$id_barang)}}" data-toggle="tooltip" data-original-title="Edit" class="edit btn btn-success edit">
Edit
</a>
<form action="{{route('barang.destroy',$id_barang)}}" method="post">
@csrf
@method('DELETE')
<button type="submit"  onClick="return confirm('Anda Yakin Ingin Menghapus Data Ini?')" class="delete btn btn-danger">Delete</button>
</form>
<!-- <a href="javascript:void(0);" id="delete-barang" data-toggle="tooltip" data-original-title="Delete" class="delete btn btn-danger">
Delete
</a> -->
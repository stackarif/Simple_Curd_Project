@extends('layouts.backend_master')
@section('title','Category')

@section('master_content')
<div class="row">
    <div class="col-md-8 mt-3">
        <div class="card">
            <div class="card-header">
                <h3 class="text-info">
                    Manage Category
                </h3>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>SL</th>
                            <th>Main section</th>
                            <th class="text-center">Actions</th>
                        </tr>
                        <tbody id="catTbody">

                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div> 

    <div class="col-md-4 mt-3">
        <div class="card">
            <div class="card-header">
                <h3 class="text-info">Add Category</h3>
            </div>
            <div class="card-body">
                <form action="" id="addCategoryForm">
                    <div class="form-group">
                        <input type="text" class="form-control" id="name" placeholder="Category Name">
                        <span class="text-danger" id="catNameError"></span>
                    </div>
                  
                    <div class="form-group">
                        <button class="btn btn-sm btn-success btn-block"><i class="fa fa-plus"></i>Add New Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- View Modal -->
<div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">View Modal</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <table class="table table-bordered">
              <tbody id="viewCatTbody" >


              </tbody>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="" id="editDataForm"></form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
@stop

@push('js')
    <script>

        const getAllCategoty = async () => {
            let url = `${admin_base_url}/category/all`

           const {data} = await axios.get(url)

           table_data_show(data)
        }
        getAllCategoty()

        const table_data_show = (items) => {

            let loop = items.map((item,index) => {

                return `
                    <tr>
                            <td>${item.id}</td>
                            <td>${item.name}</td>
                        <td class="text-center">
                            <a href="" class="btn btn-sm btn-success" data-id="${item.slug}" data-toggle="modal" data-target="#viewModal" id="viewRow"><i class="fa fa-eye"></i></a>
                            <a href="" class="btn btn-sm btn-info" data-id="${item.slug}" data-toggle="modal" data-target="#editModal" id="editRow"><i class="fa fa-edit"></i></a>
                        </td>
                    </tr>
                `
            });
            loop = loop.join("")
        const tbody = $$('#catTbody')
        tbody.innerHTML = loop
        }

        // view

        $('body').on('click','#viewRow',function(){
            let slug = $(this).data('id');


            let url = `${admin_base_url}/category/${slug}`


            axios.get(url).then(res => {
                console.log(res)
                let response = `
                  <tr>
                      <th>Name</th>
                      <td>${res.data.name}</td>
                  </tr>
                
                  `

                 let tby =  $$('#viewCatTbody')
                 tby.innerHTML = response
            })
        })

        // store
        $('#addCategoryForm').on('submit',function(e){
            e.preventDefault();
            let name = $('#name')
            let catNameError = $('#catNameError')
            catNameError.text("")

            if(name.val() === ''){
                catNameError.text("Filed must not be empty!")
                return
            }
            let data = {name: name.val()}
            axios.post("{{ route('admin.category.store') }}",data)
            .then(res=>{
                getAllCategoty();
                name.val('');
                setSuccessAlert(res.data.mgs)
            }).catch(err =>{
                if(err.response.data.errors.name){
                     catNameError.text(err.response.data.errors.name[0])

                }

            })
        })

        // delete

$('body').on('click','#deleteRow',function(e){
e.preventDefault()
const swalWithBootstrapButtons = Swal.mixin({
  customClass: {
    confirmButton: 'btn btn-success',
    cancelButton: 'btn btn-danger'
  },
  buttonsStyling: false
})

swalWithBootstrapButtons.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonText: 'Yes, delete it!',
  cancelButtonText: 'No, cancel!',
  reverseButtons: true
}).then((result) => {
  if (result.isConfirmed) {
    let slug = $(this).attr('data-id');
    const url = `${admin_base_url}/category/${slug}`;
    axios.delete(url)
    .then(res => {
        getAllCategoty();
        })
    swalWithBootstrapButtons.fire(
      'Deleted!',
      'Your file has been deleted.',
      'success'
    )
  } else if (
    /* Read more about handling dismissals below */
    result.dismiss === Swal.DismissReason.cancel
  ) {
    swalWithBootstrapButtons.fire(
      'Cancelled',
      'Your imaginary file is safe :)',
      'error'
    )
  }
})

})


// edit
$('body').on('click','#editRow',function(e){
e.preventDefault()
let slug = $(this).attr('data-id');

const url = `${admin_base_url}/category/${slug}`;
axios.get(url)
.then(res => {
    let {data} = res;
        let form = $$('#editDataForm');
        form.innerHTML = `<div class="form-group">
                <label for="">Name</label>
                <input type="text" class="form-control" id="edit_name" value="${data.name}">
                <input type="hidden" id="edit_slug" value="${data.slug}">
                <span class="text-danger" id="editNameError"></span>
            </div>
          
            <div class="form-group">
                <button class="btn btn-success btn-block">Update</button>
            </div>`
      })
});

// Update

$('body').on('submit','#editDataForm',function(e){
    e.preventDefault()
    let name = $('#edit_name').val()
    let slug = $('#edit_slug').val()
    let url = `${admin_base_url}/category/update/${slug}`

    axios.post(url,{name,slug}).then(res=>{
        getAllCategoty();
        setSuccessAlert('Data Update Successfully!')
        $('#editModal').modal('toggle')
    }).catch(err => {

    })
})

    </script>
@endpush

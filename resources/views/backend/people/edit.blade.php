@extends('layouts.backend_master')

@section('title', 'Edit People')

@section('master_content')
    <div class="card pt-3">
        <div class="card-body">
            <div class="d-flex justify-content-between mb-2">
                <h3>Edit People</h3>
                <div>
                    <a href="{{ route('admin.people.index') }}" class="btn btn-success">Back</a>
                </div>
            </div>
            <hr>
            <form action="{{ route('admin.people.update', $product->slug) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div>
                                <label for=""><b>Name : </b></label>
                                <input type="text" class="form-control" name="name" placeholder="Product Name" value="{{ $product->name }}">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div >
                                <label for=""><b>Category : </b></label>
                                <select name="category_id" id="category_id" class="form-control">
                                    <option value="">Select Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" @if ($category->id == $product->category_id) selected @endif>
                                            {{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for=""><b>Sub Category : </b></label>
                                <select name="subcategory_id" id="subcategory_id" class="form-control">
                                    <option value="">Select Sub Category</option>
                                </select>
                                @error('subcategory_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for=""><b>Email : </b></label>
                                <input type="email" class="form-control" name="email" placeholder="exam@mail.com" value="{{ $product->email }}">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for=""><b>Phone : </b></label>
                                <input type="phone" class="form-control" name="phone" value="{{ $product->phone }}" placeholder="01...">
                                @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
           
                            <div>
                                <label for=""><b>Designation: </b></label>
                                <input type="text" class="form-control" name="designation" value="{{ $product->designation }}" placeholder="">
                                @error('designation')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                         
                        <button class=" mt-2 btn btn-success">Update People</button>
    
                        </div>
                    </div>
                  
                    
            </form>
        </div>
    </div>
@stop

@push('js')
    <script>
        $('body').on('change', '#category_id', function() {
            console.log('okk');
            let url = `${admin_base_url}/people/categories/${this.value}`;
            axios.get(url).then(res => {
                let html = '';
                html += '<option value="">Select Sub Category</option>'
                res.data.data.forEach(element => {
                    html += "<option value=" + element.id + ">" + element.name + "</option>"
                });
                $('#subcategory_id').html(html)
            })
        })
    </script>
@endpush
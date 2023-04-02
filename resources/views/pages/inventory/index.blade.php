@extends('layouts.app')

@push('page_css')
    <style>
        .dot {
            height: 16px;
            width: 16px;
            border-radius: 50%;
            border: 1px black solid;
            display: inline-block;
        }

        #all-color, .all-color {
            accent-color: #f0f0f0;
            background-color: #f0f0f0;
        }

        #black, .black {
            accent-color: #000;
            background-color: #000;
        }

        #white, .white {
            accent-color: #fefefe;
            background-color: #fefefe;
        }

        #sunkist, .sunkist {
            accent-color: #ffcb88;
            background-color: #ffcb88;
        }

        #khaki, .khaki {
            accent-color: #F0E68C;
            background-color: #F0E68C;
        }

        #brown, .brown {
            accent-color: #964B00;
            background-color: #964B00;
        }

        #rust, .rust {
            accent-color: #b7410e;
            background-color: #b7410e;
        }

        #yellow-gold, .yellow-gold {
            accent-color: #FFC000;
            background-color: #FFC000;
        }

        #army-green, .army-green {
            accent-color: #4b5320;
            background-color: #4b5320;
        }

        #maroon, .maroon {
            accent-color: #800000;
            background-color: #800000;
        }

        #charcoal, .charcoal {
            accent-color: #36454f;
            background-color: #36454f;
        }

        #light-violet, .light-violet {
            accent-color: #CF9FFF;
            background-color: #CF9FFF;
        }

        #dark-violet, .dark-violet {
            accent-color: #9400d3;
            background-color: #9400d3;
        }

        #mustard, .mustard {
            accent-color: #FFDB58;
            background-color: #FFDB58;
        }

        #red, .red {
            accent-color: #FF0000;
            background-color: #FF0000;
        }

        #royal-blue, .royal-blue {
            accent-color: #4169e1;
            background-color: #4169e1;
        }

        #mint-green, .mint-green {
            accent-color: #3EB489;
            background-color: #3EB489;
        }
    </style>
@endpush

@section('content')
    <div class="container-fluid py-4 px-2">
        <div class="d-flex justify-content-between">
            {{-- search bar and button --}}
            <form class="form-inline" method="post" id="search" >
                <label for="search_bar" class="sr-only" >Search</label>
                <div class="input-group mb-2 mr-sm-2">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <i class="fas fa-search"></i>
                        </div>
                        <input type="text" class="form-control" id="search_bar" name="search_bar" placeholder="Item Code..." >
                    </div>
                </div>
            </form>
            {{-- add button --}}
            <button class="btn btn-info mb-2" data-toggle="modal" data-target="#newInventory"><i class="fas fa-plus"></i>&nbsp&nbsp Add New Item</button>
        </div>
        <div class="row my-2"></div>
        <div class="row">
            @forelse ($designs as $design)
                <div class="col-3 item-card" id="{{$design->code}}">
                    <div class="card elevation-3" style="height: 80VH">
                        <div class="card-header">
                            <h6 class="card-title text-bold">{{$design->code}}</h6>
                        </div>
                        <div class="card-body d-flex flex-column justify-between">
                            <div class="px-2">
                                <img src="{{url('storage/design_catalog/'.$design->img_url)}}" alt="" class="w-100 h-100 mx-max my-2 center">
                            </div>
                            <div class="p-2 flex-column mt-2">
                                <span class="flex-1 text-bold text-sm">Category: </span>{{ucfirst($design->category)}} <br>
                                <span class="flex-1 text-bold text-sm">Variants: @foreach($design->variants as $variant) <span title="{{$variant}}" class="dot {{$variant}}"></span> @endforeach<br>
                                <span class="flex-1 text-bold text-sm">Sizes: @foreach ($design->sizes as $size) <span class="text-xs border border-1 rounded border-primary p-1">{{strtoupper($size)}}</span> @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @empty

            @endforelse
        </div>
    </div>

    <div class="modal fade" id="newInventory" tabindex="-1" role="dialog" aria-labelledby="newInventoryLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md" role="dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="newInventoryLabel">Catalog a new Design</h4>
                    <button class="close" type="button" data-dismiss="modal"><i class="fas fa-times"></i></button>
                </div>
                <div class="modal-body px-3">
                    <form action="" method="post" enctype="multipart/form-data" id="new_item_form">
                        <div class="form-group">
                            <label for="item_code">Item Code</label>
                            <input type="text" name="item_code" id="item_code" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="item_cat">Category</label>
                            <select name="item_cat" id="item_cat" class="form-control" required>
                                <option value="regular">Regular</option>
                                <option value="premium">Premium</option>
                                <option value="tie_dye">Tie Dye</option>
                                <option value="vintage">Vintage</option>
                                <option value="stripes">Stripes</option>
                                <option value="two_color">Two Colors</option>
                                <option value="sando">Sando</option>
                                <option value="shorts">Shorts</option>
                                <option value="long_sleeves">Long Sleeves</option>
                                <option value="jacket">Jacket</option>
                                <option value="cap">Cap</option>
                                <option value="accessories">Accessories</option>
                                <option value="flask">Flask</option>
                            </select>
                        </div>
                        <div class="from-group">
                            <label for="item_var">Color Variants</label>
                            <div class="form-row mx-2">
                                <div class="col-3">
                                    <input type="checkbox" name="item_var" id="all-color" value="all">
                                    <label for="all-color" class="text-xs">All</label>
                                </div>
                                <div class="col-3">
                                    <input type="checkbox" name="item_var" id="black" value="black">
                                    <label for="black" class="text-xs">Black</label>
                                </div>
                                <div class="col-3">
                                    <input type="checkbox" name="item_var" id="white" value="white">
                                    <label for="white" class="text-xs">White</label>
                                </div>

                                <div class="col-3">
                                    <input type="checkbox" name="item_var" id="sunkist" value="sunkist">
                                    <label for="sunkkist" class="text-xs">Sunkist</label>
                                </div>

                                <div class="col-3">
                                    <input type="checkbox" name="item_var" id="khaki" value="khaki">
                                    <label for="khaki" class="text-xs">Khaki</label>
                                </div>

                                <div class="col-3">
                                    <input type="checkbox" name="item_var" id="brown" value="brown">
                                    <label for="brown" class="text-xs">Brown</label>
                                </div>

                                <div class="col-3">
                                    <input type="checkbox" name="item_var" id="rust" value="rust">
                                    <label for="rust" class="text-xs">Rust</label>
                                </div>

                                <div class="col-3">
                                    <input type="checkbox" name="item_var" id="yellow-gold" value="yellow-gold">
                                    <label for="yellow-gold" class="text-xs">Y. Gold</label>
                                </div>

                                <div class="col-3">
                                    <input type="checkbox" name="item_var" id="army-green" value="army-green">
                                    <label for="army-green" class="text-xs">A. Green</label>
                                </div>

                                <div class="col-3">
                                    <input type="checkbox" name="item_var" id="maroon" value="maroon">
                                    <label for="maroon" class="text-xs">Maroon</label>
                                </div>

                                <div class="col-3">
                                    <input type="checkbox" name="item_var" id="charcoal" value="charcoal">
                                    <label for="charcoal" class="text-xs">Charcoal</label>
                                </div>

                                <div class="col-3">
                                    <input type="checkbox" name="item_var" id="light-violet" value="light-violet">
                                    <label for="light-violet" class="text-xs">L. Violet</label>
                                </div>

                                <div class="col-3">
                                    <input type="checkbox" name="item_var" id="dark-violet" value="dark-violet">
                                    <label for="dark-violet" class="text-xs">D. Violet</label>
                                </div>

                                <div class="col-3">
                                    <input type="checkbox" name="item_var" id="mustard" value="mustard">
                                    <label for="mustard" class="text-xs">Mustard</label>
                                </div>

                                <div class="col-3">
                                    <input type="checkbox" name="item_var" id="red" value="red">
                                    <label for="red" class="text-xs">Red</label>
                                </div>

                                <div class="col-3">
                                    <input type="checkbox" name="item_var" id="royal-blue" value="royal-blue">
                                    <label for="royal-blue" class="text-xs">R. Blue</label>
                                </div>

                                <div class="col-3">
                                    <input type="checkbox" name="item_var" id="mint-green" value="mint-green">
                                    <label for="mint-green" class="text-xs">M.Green</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="item_size">Size Variants</label>
                            <div class="form-row">
                                <div class="col-12 ">
                                    <span class="border border-2 border-primary rounded p-2 text-xs">
                                        <input type="checkbox" name="item_size" id="item_size1" value="all">
                                        <label for="item_size1" >All Sizes</label>
                                    </span>
                                </div>
                            </div>
                            <label class="text-info mx-0 my-2 text-sm">Adult</label>
                            <div class="form-row">
                                <div class="col-2">
                                    <span class="border border-2 border-primary rounded p-2 text-xs">
                                        <input type="checkbox" name="item_size" id="xs" value="xs">
                                        <label for="xs" >XS</label>
                                    </span>
                                </div>
                                <div class="col-2">
                                    <span class="border border-2 border-primary rounded p-2 text-xs">
                                        <input type="checkbox" name="item_size" id="s" value="s">
                                        <label for="s" >S</label>
                                    </span>
                                </div>
                                <div class="col-2">
                                    <span class="border border-2 border-primary rounded p-2 text-xs">
                                        <input type="checkbox" name="item_size" id="m" value="m">
                                        <label for="m" >M</label>
                                    </span>
                                </div>
                                <div class="col-2">
                                    <span class="border border-2 border-primary rounded p-2 text-xs">
                                        <input type="checkbox" name="item_size" id="l" value="l" class="align-center">
                                        <label for="l" >L</label>
                                    </span>
                                </div>
                                <div class="col-2">
                                    <span class="border border-2 border-primary rounded p-2 text-xs">
                                        <input type="checkbox" name="item_size" id="xl" value="xl">
                                        <label for="xl" >XL</label>
                                    </span>
                                </div>
                                <div class="col-2">
                                    <span class="border border-2 border-primary rounded p-2 text-xs">
                                        <input type="checkbox" name="item_size" id="xxl" value="xxl">
                                        <label for="xxl" >XXL</label>
                                    </span>
                                </div>
                            </div>
                            <label class="text-info mx-0 my-2 text-sm">Kids</label>
                            <div class="form-row">
                                <div class="col-2">
                                    <span class="border border-2 border-primary rounded p-2 text-xs">
                                        <input type="checkbox" name="item_size" id="s4" value="s4">
                                        <label for="s4" >S4</label>
                                    </span>
                                </div>
                                <div class="col-2">
                                    <span class="border border-2 border-primary rounded p-2 text-xs">
                                        <input type="checkbox" name="item_size" id="s6" value="s6">
                                        <label for="s6" >S6</label>
                                    </span>
                                </div>
                                <div class="col-2">
                                    <span class="border border-2 border-primary rounded p-2 text-xs">
                                        <input type="checkbox" name="item_size" id="s8" value="s8">
                                        <label for="s8" >S8</label>
                                    </span>
                                </div>
                                <div class="col-2">
                                    <span class="border border-2 border-primary rounded p-2 text-xs">
                                        <input type="checkbox" name="item_size" id="s10" value="s10" >
                                        <label for="s10" >S10</label>
                                    </span>
                                </div>
                                <div class="col-2">
                                    <span class="border border-2 border-primary rounded p-2 text-xs">
                                        <input type="checkbox" name="item_size" id="s12" value="s12">
                                        <label for="s12" >S12</label>
                                    </span>
                                </div>
                                <div class="col-2">
                                    <span class="border border-2 border-primary rounded p-2 text-xs">
                                        <input type="checkbox" name="item_size" id="s14" value="s14">
                                        <label for="s14" >S14</label>
                                    </span>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label for="item_img">Display Image</label>
                                <input type="file" name="item_img" id="item_img" accept="image/*" class="form-control" onchange="loadFile(event)" required>
                                <div class="d-flex">
                                    <div class="card elevation-2 w-50 mx-auto mt-3" style="height:275px">
                                        <div class="card-body">
                                            <img src="{{asset('images/image-preview.png')}}" alt="image-preview" class="w-100 h-100" id="image_preview">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="item_gallery">Additional Images</label>
                                <input type="file" class="form-control" id="item_gallery" accept="image/*" multiple>
                                <div class="container">
                                    <div class="row" id="gallery">

                                    </div>
                                </div>
                            </div>
                            <div class="form-group mx-5 mt-2">
                                <button type="submit" class="btn btn-block btn-success">Complete</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('page_scripts')
<script>
    var loadFile = function(event) {
        var image = document.getElementById('image_preview');
        image.src = URL.createObjectURL(event.target.files[0]);
    };

    $('#new_item_form').on('submit', function(event) {
        event.preventDefault();
        var item_code,item_cat, item_var = [], item_size = [], item_img, url;
        item_code = $('#item_code').val();
        item_cat = $('#item_cat').val();
        $('input[name=item_var]:checked').each(function() {
            item_var.push($(this).val())
        });
        $('input[name=item_size]:checked').each(function() {
            item_size.push($(this).val())
        });
        item_img = document.querySelector('#item_img');
        item_gallery = document.querySelector('#item_gallery');
        url = "{{route('add-new-design')}}";
        var formData = new FormData();
        formData.append('img', item_img.files[0]);
        formData.append('gallery', item_img.files)
        formData.append('code', item_code);
        formData.append('cat', item_cat);
        formData.append('var', item_var);
        formData.append('size', item_size);

        axios.post(url, formData, {
            'Content-Type': 'multipart/form-data'
        }).then(function(res){
            var response = res.data;
            if(response == "Design cataloged successfully!") {
                Swal.fire({
                    title: "Success!",
                    icon: 'success',
                    text: response,
                    showCancelButton: false,
                    showConfirmButton: false,
                    timer: 3000,
                    allowOutsideClick: false
                }).then((result) => {
                    if (result.dismiss === Swal.DismissReason.timer) {
                        location.reload();
                    }
                });
            }else{
                Swal.fire({
                    title: "Oops!",
                    icon: 'danger',
                    text: response,
                    showCancelButton: false,
                });
            }
        }).catch(function(err){
            console.log(err.response.data);
        });
    });

    $('#search').on('submit', function(e) {
        e.preventDefault();


    })

    $('#search').on('keyup change', function(e) {
        var id = $('#search_bar').val().toLowerCase();
        $('.item-card').each(function(i, obj) {
            var target = $(this).attr('id');
            if(target.toLowerCase().indexOf(id) == -1){
                $(this).css('display', 'none')
            }
            else {
                $(this).css('display', '')
            }
        })
    })

    const output = document.querySelector("#gallery")
    const input = document.querySelector('#item_gallery')
    let imageArray = []

    input.addEventListener('change', () => {
        const files = input.files

        for(let i = 0; i < files.length; i++) {
            imageArray.push(files[i])
        }
        console.log(input.files)
        displayImages()
    })

    function displayImages() {
        let images = ""
        imageArray.forEach((image, index) => {
            images += `<div class='col-3'>
                            <div class='card elevation-2 mx-auto mt-3' style='height: 100px'>
                                <div class='card-body'>
                                    <img src="${URL.createObjectURL(image)}" class='w-100 h-100'>
                                </div>
                            </div>
                        </div>`
        })

        output.innerHTML = images

    }
</script>
@endpush

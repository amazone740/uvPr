@extends('layouts.app')

@section('content')

<h1> Client</h1>
          
<div class="col-xl-3 col-lg-12 col-md-6 col-sm-12 col-12">
                                <!-- ============================================================== -->
                                <!-- top perfomimg  -->
                                <div class="card">
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                            <table class="table no-wrap p-table">
                                                <thead class="bg-light">
                                                    <tr class="border-0">
                                                        <th class="border-0">Clients</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($data as $client)
                                                    <tr>
                                                        <td>{{$client->name }}</td>
                                                @endforeach
                                                    </tr>
                                                    
                                                </tbody>
                                            </table>

                                        </div>
	                            <!-- ============================================================== -->
                                <!-- end top perfomimg  -->
                                <!-- ============================================================== -->
                            </div>
    @endsection

    <li	class="nav-item	dropdown">
	 				<a	class="nav-link	dropdown-toggle {{ currentRoute(
	 																	route('category.create'),
	 																	route('category.index'),
	 															        route('category.edit',request()->category?:0),
	 															        route('orphans.index'))}}" href="#" id="navbarDropdownGestCat"	role="button" data-toggle="dropdown" aria-haspopup="true"	aria-expanded="false">
	 								@lang('Administration')
	 				</a>
	 				<div class="dropdown-menu" aria-labelledby="navbarDropdownGestCat">
	 								<a class="dropdown-item" href="{{route('category.create') }}">
	 							     	<i	class="fas	fa-plus	fa-lg"></i>	@lang('Ajouter une	catégorie')
	 								</a>
	 								<a	class="dropdown-item" href="{{route('category.index') }}">
	 									<i	class="fas	fa-wrench fa-lg"></i> @lang('Gérer les catégories')
	 								</a>
	 								<a	class="dropdown-item" href="{{route('orphans.index')}}">
	 									<i class="fasfa images fa-lg"></i>	@lang('Photos orphelines')
	 								</a>
	 				</div>
	 </li>

	 @endadmin>
                                   </div>
                                </div>
    @admin
     <li	class="nav-item	dropdown">
	 				<a	class="nav-link	dropdown-toggle{{	currentRoute(
	 				    route('category.create'),
	 					route('category.index'),							
                        route('category.edit',	request()->category?:	0),
	 					route('orphans.index'),)}}"	href="#"	id="navbarDropdownGestCat"	role="button"	data-toggle="dropdown" aria-haspopup="true"	aria-expanded="false">
	 				
	 				</a>
	 				<div	class="dropdown-menu"	aria-labelledby="navbarDropdownGestCat">
	 								<a	class="dropdown-item"	href="{{	route('category.create')	}}">
	 												<i	class="fas	fa-plus	fa-lg"></i>	@lang('Ajouter	une	catégorie')
	 								</a>
	 								<a	class="dropdown-item"	href="{{	route('category.index')	}}">
	 												<i	class="fas	fa-wrench	fa-lg"></i>	@lang('Gérer	les	catégories')
	 								</a>
	 								<a	class="dropdown-item"	href="{{	route('orphans.index')	}}">
	 												<i	class="fas	fa-images	fa-lg"></i>	@lang('Photos	orphelines')
	 								</a>
	 				</div>
	 </li>
	 @endadmin
    
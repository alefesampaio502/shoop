@extends('admin.layout.master')

@section('content')
<section class="section">
          <div class="section-header">
            <h1>Meus Dados</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard')}}">Painel</a></div>
              <div class="breadcrumb-item">Perfil</div>
            </div>
          </div>
          <div class="section-body">
            <div class="row mt-sm-4">  
              {{-- INICIO BLOCO 1 --}} 
              <div class="col-12 col-md-12 col-lg-7">
                 
                <div class="card">
                  <form  action="{{ route('admin.profile.update')}}" method="post" class="needs-validation" novalidate="" enctype="multipart/form-data"> 
                                 
                        @csrf
                     
                    <div class="card-header">
                      <h4>Atualiza perfil</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">   
                       
                        <div class="form-group  col-12">
                              <div class="mb-3">
                           @if(Auth::user()->image != null)
                            <img src="{{asset(Auth::user()->image)}}" alt="{{Auth::user()->name}}" class="img-fluid" style="width:80px; height:auto; object-fit:cover;border-radius:50%;">
                              @else
                             <img src="{{asset('uploads/semfoto.jpeg')}}" alt="{{Auth::user()->name}}" class="img-fluid" style="width:80px; height:auto; object-fit:cover; border-radius:50%;">
                              @endif
                              </div>
                            <label>Foto de perfil</label>
                            <input type="file" class="form-control" name="image">
                         
                          </div>

                          <div class="form-group col-md-6 col-12">
                            <label>Nome</label>
                            <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}" required="">
                            
                          </div>
                          <div class="form-group col-md-6 col-12">
                            <label>E-mail</label>
                            <input type="email" class="form-control" name="email" value="{{ Auth::user()->email }}" required="">
                           
                          </div>
                        </div>
                      
                    </div>
                    <div class="card-footer text-right">
                      <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                  </form>
                </div>
              </div>
              {{-- FIM BLOCO 1 --}} 

               {{-- INICIO BLOCO 2 --}} 
              <div class="col-12 col-md-12 col-lg-7">

                <div class="card">
                  <form  action="{{ route('admin.profile.update.password')}}" method="post" class="needs-validation" novalidate="" enctype="multipart/form-data">                                
                        @csrf                  
                    <div class="card-header">
                      <h4>Atualiza Senha</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">   
                       
                        <div class="form-group  col-12">                        
                            <label>Senha atual</label>
                            <input type="password" name="current_password" class="form-control" placeholder="Digite sua senha atual">
                          </div>

                          <div class="form-group  col-12">                        
                            <label>Nova senha</label>
                            <input type="password" name="password" class="form-control" placeholder="Digite nova senha">
                          </div>

                          <div class="form-group  col-12">                        
                            <label>Confirme sua senha</label>
                            <input type="password" name="password_confirmation" class="form-control" placeholder="Confirme sua nova senha">
                          </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                      <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                  </form>
                </div>
              </div>
              {{-- FIM BLOCO 1 --}} 
            </div>
          </div>
        </section>
@endsection
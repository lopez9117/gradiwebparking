@extends('layout2');

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12">
                 <div align="right">
                 <button type="button" name="add" id="add_data" class="btn btn-success btn-sm">Add</button>
                </div>
                 <br />


               
                 



                <table id="segments" class="display nowrap compact table table-condensed table-striped table-bordered" style="width:100%" >
                    <thead>
                    <tr>       
                       <TH>ACTION</TH>       
                       <td>PLACA</td>
                        <td>TIPO VEHICULO</td>
                        <td>MARCA</td>
                        <td>PROPIETARIO</td>                                                        
                      </tr>
                    </thead>
                </table>


               
            </div>
        </div>    
    </div>


         <div id="studentModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" id="student_form">
                <div class="modal-header">
                   <button type="button" class="close" data-dismiss="modal">&times;</button>
                   <h4 class="modal-title">Add Data</h4>
                </div>
                <div class="modal-body">
                    {{csrf_field()}}
                    <span id="form_output"></span>
                                     
                    <input type="hidden" name="id" id="id" value="" />

                    <div class="form-group">
                        <label> PLACA</label>
                        <input type="text" name="placa"  id="placa" class="form-control" />
                    </div>
                     <div class="form-group">
                        <label> TIPO VEHICULO</label>
                        <input type="text" name="tipodevehiculo"  id="tipodevehiculo" class="form-control" />
                    </div>
                     <div class="form-group">
                        <label> MARCA</label>
                        <input type="text" name="marca"  id="marca" class="form-control" />
                    </div>

                   <div class="form-group">
                               <label>Propietario</label>
                               <select class="form-control" placeholder="Selecciona" id="propietario" name="propietario">
                                 @foreach($propietarios as $propietario)
                                  <option value="{{$propietario->id }}">{{$propietario->name}}</option>
                                  @endforeach
                               </select>
                    </div>

                 

                              

                <div class="modal-footer">

                     <input type="hidden" name="student_id" id="student_id" value="" />
                    <input type="hidden" name="button_action" id="button_action" value="insert" />
                    <input type="submit" name="submit" id="action" value="Add" class="btn btn-info" />
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
    </div>


  

    <script src="https://code.jquery.com/jquery-3.3.1.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"    type="text/javascript"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="http://malsup.github.com/jquery.form.js"></script>


 <script type="text/javascript">








    $(document).ready(function(){
        $('#segments').DataTable( {
            
             "scrollX": true,
             "scrollY":  "320px",
             "scrollCollapse": true,
             "processing": true,
            "serverSide": true,
            "iDisplayLength": 1000,
            "ajax":"{{route('getvehicle')}}",
             method:"POST",

                    "columns":[
                    {data: 'action', name: 'action',orderable:false, searchable: false},
                        {data: 'placa', name: 'vehicles.placa'},
                        {data: 'tipodevehiculo', name: 'vehicles.tipodevehiculo'},
                         {data: 'marca', name: 'vehicles.marca'},                                     
                        {data: 'name', name: 'users.name'},

                      
                    
                
            ],
         } );




 

    } );





        $('#add_data').click(function(){
        $('#studentModal').modal('show');
        $('#student_form')[0].reset();
        $('#form_output').html('');
        $('#button_action').val('insert');
        $('#action').val('Add');
          });



  

  $('#student_form').on('submit', function(event){
        event.preventDefault();
        var form_data = $(this).serialize();
        $.ajax({
            url:"{{ route('postvehicle') }}",
            method:"POST",
            data:form_data,
            dataType:"json",
            success:function(data)
            {
                if(data.error.length > 0)
                {
                    var error_html = '';
                    for(var count = 0; count < data.error.length; count++)
                    {
                        error_html += '<div class="alert alert-danger">'+data.error[count]+'</div>';
                    }
                    $('#form_output').html(error_html);
                }
                else
                {
                    $('#form_output').html(data.success);
                    $('#student_form')[0].reset();
                    $('#action').val('Add');
                    $('.modal-title').text('Add Data');
                    $('#button_action').val('insert');
                    $('#segments').DataTable().ajax.reload();
                    
                    $('#studentModal').modal('hide');
                }
            }
        })
    });



     $(document).on('click', '.edit', function(){
        var id = $(this).attr("id");
        $('#form_output').html('');
        $.ajax({
            url:"{{route('fetchvehicle')}}",
            method:'get',
            data:{id:id},
            dataType:'json',        
            success:function(data)
            {
                console.log(data);
                         $('#id').val(data[0].id); 
                         $('#placa').val(data[0].placa);
                        
                       $('#tipodevehiculo').val(data[0].tipodevehiculo);
                         $('#marca').val(data[0].marca);
                        
                       $('#propietario').val(data[0].name);
                      
               // 'vehicles.id', 'vehicles.placa', 'vehicles.tipodevehiculo', 'vehicles.marca', 'users.name'
                
                $('#student_id').val(id);
                $('#studentModal').modal('show');
                $('#action').val('Edit');
                $('.modal-title').text('Edit Data');
                $('#button_action').val('update');
            }
        })
    });


         $(document).on('click', '.delete', function(){
        var id = $(this).attr('id');
        if(confirm("Are you sure you want to Delete this  Vehicle?"))
        {
            $.ajax({
                url:"{{route('deletevehicle')}}",
                mehtod:"get",
                data:{id:id},
                success:function(data)
                {
                   
                    $('#segments').DataTable().ajax.reload();
                     
                }
            })
        }
        else
        {
            return false;
        }
    }); 







</script>
 @stop()


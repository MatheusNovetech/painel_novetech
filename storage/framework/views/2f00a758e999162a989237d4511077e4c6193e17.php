<?php $__env->startSection('title', trans('messages.mainapp.menu.call')); ?>

<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(asset('assets/js/plugins/data-tables/css/jquery.dataTables.min.css')); ?>" type="text/css" rel="stylesheet" media="screen,projection">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div id="breadcrumbs-wrapper">
        <div class="container">
            <div class="row">
                <div class="col s12 m12 l12">
                    <h5 class="breadcrumbs-title col s5" style="margin:.82rem 0 .656rem"><?php echo e(trans('messages.mainapp.menu.call')); ?></h5>
                    <ol class="breadcrumbs col s7 right-align">
                        <li><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(trans('messages.mainapp.menu.dashboard')); ?></a></li>
                        <li class="active"><?php echo e(trans('messages.mainapp.menu.call')); ?></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="container">

        <div class="row">

            <!--********************AQUI VINCULA O USUARIO pra SENHA********************-->

            <div class="col s12 m6">
                <div class="card">
                                <div class="card-content">
                        <span class="card-title" style="line-height:0;font-size:22px"><?php echo e(trans('messages.call.new_call')); ?></span>
                        <div class="divider" style="margin:10px 0 10px 0"></div>
                        <form id="new_call" action="<?php echo e(route('post_call')); ?>" method="post">
                            <?php echo e(csrf_field()); ?>

                            <?php if(!$user->is_admin): ?>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <label for="user"><?php echo e(trans('messages.call.user')); ?></label>
                                        <input id="user" type="hidden" name="user" value="<?php echo e($user->id); ?>" data-error=".user">
                                        <input type="text" data-error=".user" value="<?php echo e($user->name); ?>" readonly>
                                        <div><?php echo e($user); ?></div>
                                        <div class="user">
                                            <?php if($errors->has('user')): ?><div class="error"><?php echo e($errors->first('user')); ?></div><?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php else: ?>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <label for="user" class="active"><?php echo e(trans('messages.call.user')); ?></label>
                                        <
                                        <div><?php echo e($users); ?></div>

                                        <select id="user" class="browser-default" name="user" data-error=".user">
                                            <option value=""><?php echo e(trans('messages.select')); ?> <?php echo e(trans('messages.call.user')); ?></option>
                                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cuser): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                <option value="<?php echo e($cuser->id); ?>"<?php echo $cuser->id==old('user')?' selected':''; ?>><?php echo e($cuser->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                        </select>
                                        <div class="user">
                                            <?php if($errors->has('user')): ?><div class="error"><?php echo e($errors->first('user')); ?></div><?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <div class="row">
                                <div class="input-field col s12">
                                    <label for="department" class="active"><?php echo e(trans('messages.mainapp.menu.department')); ?></label>
                                    <select id="department" class="browser-default" name="department" data-error=".department">
                                        <option value=""><?php echo e(trans('messages.select')); ?> <?php echo e(trans('messages.mainapp.menu.department')); ?></option>
                                        <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                            <?php if(session()->has('department') && ($department->id==session()->get('department'))): ?>
                                                <option value="<?php echo e($department->id); ?>" selected><?php echo e($department->name); ?></option>
                                            <?php else: ?>
                                                <option value="<?php echo e($department->id); ?>"><?php echo e($department->name); ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                    </select>
                                    <div class="department">
                                        <?php if($errors->has('department')): ?><div class="error"><?php echo e($errors->first('department')); ?></div><?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <label for="counter" class="active"><?php echo e(trans('messages.mainapp.menu.counter')); ?></label>
                                    <select id="counter" class="browser-default" name="counter" data-error=".counter">
                                        <option value=""><?php echo e(trans('messages.select')); ?> <?php echo e(trans('messages.mainapp.menu.counter')); ?></option>
                                        <?php $__currentLoopData = $counters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $counter): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                            <?php if(session()->has('counter') && ($counter->id==session()->get('counter'))): ?>
                                                <option value="<?php echo e($counter->id); ?>" selected><?php echo e($counter->name); ?></option>
                                            <?php else: ?>
                                                <option value="<?php echo e($counter->id); ?>"><?php echo e($counter->name); ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                    </select>
                                    <div class="counter">
                                        <?php if($errors->has('counter')): ?><div class="error"><?php echo e($errors->first('counter')); ?></div><?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <button class="btn waves-effect waves-light right" type="submit">
                                        <?php echo e(trans('messages.call.call_next')); ?><i class="mdi-navigation-arrow-forward right"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

               <!--********************FIM VINCULA O USUARIO pra SENHA********************-->

                <div class="card">
                    <div class="card-content">
                        <span class="card-title" style="line-height:0;font-size:22px"><?php echo e(trans('messages.call.click_department')); ?></span>
                        <div class="divider" style="margin:10px 0 10px 0"></div>
                        <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <span class="btn waves-effect waves-light" onclick="call_dept(<?php echo e($department->id); ?>)" style="margin-bottom:10px;margin-right:5px;text-transform:none"><?php echo e($department->name); ?></span>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    </div>
                </div>
            </div>
            <div class="col s12 m6">
                <div class="card">
                    <div class="card-content" style="font-size:14px">
                        <span class="card-title" style="line-height:0;font-size:22px"><?php echo e(trans('messages.call.todays_queue')); ?></span>
                        <div class="divider" style="margin:10px 0 10px 0"></div>
                        <table id="call-table" class="display" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th><?php echo e(trans('messages.mainapp.menu.department')); ?></th>
                                    <th><?php echo e(trans('messages.call.number')); ?></th>
                                    <th><?php echo e(trans('messages.call.called')); ?></th>
                                    <th><?php echo e(trans('messages.mainapp.menu.counter')); ?></th>
                                    <th><?php echo e(trans('messages.call.recall')); ?></th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
       
            <!--CARD NOVO-->
            <div class="col s12 m6">
                            <div class="card">
                            <div class="card-content">
                                <span class="card-title" style="line-height:0;font-size:22px"><?php echo e(trans('messages.call.click_department')); ?></span>
                                <div class="divider" style="margin:10px 0 10px 0"></div>
                                <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                    <span class="btn waves-effect waves-light" onclick="call_dept_2(<?php echo e($department->id); ?>, <?php echo e($users); ?>)" style="margin-bottom:10px;margin-right:5px;text-transform:none"><?php echo e($department->name); ?></span>
                                
                                    <div><?php echo e($department); ?></div>
                                    
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
	
<?php $__env->stopSection(); ?>

<!--*****************IMPRIMIR SENHA*****************-->
<?php $__env->startSection('print'); ?>
    <?php if(session()->has('department_name')): ?>
        <style>#printarea{ display:none; text-align:center} @media  print{#loader-wrapper,header,#main,footer,#toast-container{display:none}#printarea{display:block;}}@page{margin:0}</style>
        <div id="printarea" style="line-height:1.25">
            <span style="font-size:20px; font-weight: bold"><?php echo e($company_name); ?></span><br>
            <span style="font-size:20px"><?php echo e(session()->get('department_name')); ?></span><br>
            <span style="font-size:18px">SENHA</span><br>
            <span><h3 style="font-size:50px;font-weight:bold;margin:0;line-height:1.5"><?php echo e(session()->get('number')); ?></h3></span>
            <span style="font-size:18px">Aguarde ser chamado</span><br>
            <span style="font-size:18px">Total em Espera: <?php echo e(session()->get('total')-1); ?></span><br>
            <span style="float:left"><?php echo e(\Carbon\Carbon::now()->format('d-m-Y')); ?></span><span style="float:right" margin-top= "10px"><?php echo e(\Carbon\Carbon::now()->format('h:i:s A')); ?></span><br>
            <span style="font-size:18px">---------------------------------</span><br>
        </div>
        <script>
            window.onload = function(){window.print();}
        </script>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<!--*****************IMPRIMIR SENHA FIM*****************-->


<?php $__env->startSection('script'); ?>
    <script type="text/javascript" src="<?php echo e(asset('assets/js/plugins/data-tables/js/jquery.dataTables.min.js')); ?>"></script>
    <script>
        $("#new_call").validate({
            rules: {
                user: {
                    required: true,
                    digits: true
                },
                department: {
                    required: true,
                    digits: true
                },
                counter: {
                    required: true,
                    digits: true
                },
            },
            errorElement : 'div',
            errorPlacement: function(error, element) {
                var placement = $(element).data('error');
                if (placement) {
                    $(placement).append(error)
                } else {
                    error.insertAfter(element);
                }
            }
        });

        /* PRINT CALL: {"id":1,"name":"TRIAGEM","letter":"T","start":5,"created_at":"2019-08-18 12:42:15","updated_at":"2021-08-29 15:25:05"}
           
           NOVA CHAMADA: {"id":1,"name":"Michel Fernandes","username":"Michel",
                          "email":"michel.fernandes@novetech.com.br",
                          "role":"A","created_at":"2019-08-18 12:39:55",
                          "updated_at":"2021-11-09 12:22:12"},*/

        function call_dept(value) {
            console.log(value)
            $('body').removeClass('loaded');
            var myForm1 = '<form id="hidfrm1" action="<?php echo e(url('calls/dept')); ?>/'+value+'" method="post"><?php echo e(csrf_field()); ?></form>';
            $('body').append(myForm1);
            myForm1 = $('#hidfrm1');
            myForm1.submit();
        }

        function call_dept_2(value, users) {
            


            $array = $.map(users, function( a ) {
             return (a.id === value);
            });
            
           console.log($array);



           /* $('body').removeClass('loaded');
            var myForm1 = '<form id="hidfrm1" action="<?php echo e(url('calls/dept')); ?>/'+value+'" method="post"><?php echo e(csrf_field()); ?></form>';
            $('body').append(myForm1);
            myForm1 = $('#hidfrm1');
            myForm1.submit();*/
        }

        /*CHAMADA RECALL:
        {
        "queue_id":137,"department_id":1,
        "counter_id":8,
        "user_id":12,
        "number":5,
        "called_date":"2021-11-17",
        "updated_at":"2021-11-17 07:20:19",
        "created_at":"2021-11-17 07:20:19","id":210
        }*/

        function recall(call_id) {
            $('body').removeClass('loaded');
            var data = 'call_id='+call_id+'&_token=<?php echo e(csrf_token()); ?>';
            $.ajax({
                type:"POST",
                url:"<?php echo e(route('post_recall')); ?>",
                data:data,
                cache:false,
                success: function(response) {
                    
                    location.reload();
                }
            });
        }

        $(function() {
            var calltable = $('#call-table').dataTable({
                "oLanguage": {
                    "sLengthMenu": "Show _MENU_",
                    "sSearch": "Search"
                },
                "columnDefs": [{
                    "targets": [ -1 ],
                    "searchable": false,
                    "orderable": false
                }],
                "ajax": "<?php echo e(url('assets/files/call')); ?>",
                "columns": [
                    { "data": "id" },
                    { "data": "department" },
                    { "data": "number" },
                    { "data": "called" },
                    { "data": "counter" },
                    { "data": "recall" }
                ]
            });

            setInterval(function(){
                calltable.api().ajax.reload(null,false);
            }, 3000);
        });

        /*NOVA CHAMADA ARRAY $users:
        
        [{"id":1,"name":"Michel Fernandes","username":"Michel",
         "email":"michel.fernandes@novetech.com.br",
         "role":"A","created_at":"2019-08-18 12:39:55",
         "updated_at":"2021-11-09 12:22:12"},
         {"id":8,"name":"ENFERMEIRO(A)","username":"CONSULT\u00d3RIO 02","email":"enfermeiro@enfermeiro.com.br","role":"S","created_at":"2021-08-28 19:41:50","updated_at":"2021-08-28 19:41:50"},{"id":9,"name":"MEDICO","username":"CONSULT\u00d3RIO 01","email":"medico1@medico.com.br","role":"S","created_at":"2021-08-28 19:43:14","updated_at":"2021-11-09 12:21:54"},{"id":10,"name":"VACINA","username":"VACINA","email":"vacina@vacina.com.br","role":"S","created_at":"2021-08-28 19:56:13","updated_at":"2021-08-28 19:56:13"},{"id":11,"name":"ODONTO","username":"ODONTO","email":"odonto@odonto.com.br","role":"S","created_at":"2021-08-28 19:57:21","updated_at":"2021-08-28 19:57:21"},{"id":12,"name":"TRIAGEM","username":"TRIAGEM","email":"triagem@triagem.com.br","role":"S","created_at":"2021-08-28 19:59:43","updated_at":"2021-08-29 16:09:23"},{"id":13,"name":"RECEPCIONISTA","username":"RECEPCIONISTA","email":"recepcao@recepcao.com.br","role":"S","created_at":"2021-08-28 20:00:46","updated_at":"2021-08-28 20:00:46"}]*/
    </script>

    
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
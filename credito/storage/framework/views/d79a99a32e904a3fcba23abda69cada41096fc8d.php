<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Ingreso </div>
                <div class="panel-body">
                    <form class="form-horizontal" method="post" enctype="multipart/form-data">
                        <div class="form-group<?php echo e($errors->has('dni') ? ' has-error' : ''); ?>">
                            <label for="email" class="col-md-4 control-label">DNI</label>
                            <div class="col-md-6">
                                <input id="dni" class="form-control" name="dni" required autofocus>
                                <?php echo $errors->first('dni'); ?>

                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="button" class="btn btn-primary login_user">
                                    Entrar
                                </button>
                            </div>
                        </div>
                        <div>
                            <span><?php echo e(app('request')->input('resultado')); ?></span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
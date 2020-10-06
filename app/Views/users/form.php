<?php

$id = isset($user) ? $user->id : "";
$name= isset($user) ? $user->name : "";
$email= isset($user) ? $user->email : "";
$nik= isset($user) ? $user->nik : "";
$password= isset($user) ? $user->password : "";
$passwordMessage= isset($user) ? "Masukkan Password jika ingin menggantinya !" : "Enter password";
$nikMessage= isset($user) ? "Masukkan NIK jika ingin menggantinya !" : "Enter NIK";
$nikRequired= isset($user) ? "" : "required";
$no_tel= isset($user) ? $user->no_tel : "";
$role= isset($user) ? $user->roles : "";
$v = isset($v) ? "readonly" : "";
$btn = isset($user) ? "Ubah" : "Simpan";
?>
<!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">User Management</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?php echo base_url('/hello'); ?>">Dashboard</a></li>
              <li class="breadcrumb-item">User Management</li>
              <li class="breadcrumb-item active" aria-current="page"><?php echo $arr; ?></li>
            </ol>
          </div>
       
       <div class="row">
            <div class="col-lg-12">
              <!-- Form Basic -->
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary"><?php echo $title; ?></h6>
                </div>
                <div class="card-body">
                  <form action="<?php echo site_url($urlmethod) ?>" method="post"  enctype="multipart/form-data">
                  <input type="hidden" name="id" value="<?php echo $id; ?>">  
                  <input type="hidden" name="password2" value="<?php echo $password; ?>">
                  <input type="hidden" name="nik2" value="<?php echo $nik; ?>">
                  <div class="form-group">
                      <label for="name">Name</label>
                      <input type="text" class="form-control" id="name" name="name" aria-describedby="name"
                        placeholder="Enter name" value="<?php echo $name?>" <?php echo $v; ?> required autocomplete="off">
                      <small id="name" class="form-text text-muted">Input name  properly.</small>
                    </div>
                    <div class="form-group">
                      <label for="name">NIK</label>
                      <?php if ($v == "") { ?>
                      <input type="text" class="form-control" id="nik" name="nik" aria-describedby="nik"
                        placeholder="<?php echo $nikMessage; ?>" <?php echo $v; ?> <?php echo $nikRequired; ?> autocomplete="off">
                      <small id="nik" class="form-text text-muted">Input NIK  properly.</small>
                      <?php } else {?>

                      <p><?php echo $user->nik; ?></p>

                      <?php } ?>
                    </div>
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="email" class="form-control" id="email" name="email" aria-describedby="email"
                        placeholder="Enter Email" value="<?php echo $email?>" <?php echo $v; ?> required autocomplete="off">
                      <small id="email" class="form-text text-muted">Input Email properly.</small>
                    </div>
                    <?php if ($v == "") { ?>
                    <div class="form-group">
                      <label for="password">Password</label>
                      <input type="password" class="form-control" id="password" name="password" aria-describedby="password"
                        placeholder="<?php echo $passwordMessage; ?>" <?php echo $v; ?> autocomplete="off">
                      <small id="password" class="form-text text-muted">Input Password properly.</small>
                    </div>
                    <?php  } ?>
                    <div class="form-group">
                      <label for="no_tel">No Telepon</label>
                      <input type="text" class="form-control" id="no_tel" name="no_tel" aria-describedby="no_tel"
                        placeholder="Enter No Telepon" value="<?php echo $no_tel?>" <?php echo $v; ?> required autocomplete="off">
                      <small id="no_tel" class="form-text text-muted">Input No Telepon properly.</small>
                    </div>


                    <div class="form-group">
                    <label for="select2Single">Level User</label>
                    <?php if ($v == "") { ?>

                      <select class="select2-single form-control"  name="role" id="select2Single" required>
                          <?php if($role !== "") { ?>

                            <option value="<?php echo $user->role_id ?>" selected><?php echo $user->roles; ?></option>
                            <?php  foreach ($roles as $row) { ?>
                            <option value="<?php echo $row["id"] ?>"><?php echo $row["name_role"];  ?></option>
                            <?php }?>

                          <?php } else { ?>
                            
                            <option value="" selected>Choose Level User</option>
                            <?php  foreach ($roles as $row) { ?>
                            <option value="<?php echo $row["id"] ?>"><?php echo $row["name_role"];  ?></option>
                            <?php }?>

                          <?php }?>

                      </select>

                    <?php } else {?>

                      <p><?php echo $user->roles; ?></p>
                      
                    <?php } ?>
                  </div>
                    
                    <?php if ($v == "") { ?>
                      <button type="submit" class="btn btn-primary"><?php echo $btn; ?></button>
                    <?php }?>
                    <a href="/role" class="btn btn-primary" >Kembali</a>
                  </form>
                </div>
              </div>
            </div>
        </div>


   
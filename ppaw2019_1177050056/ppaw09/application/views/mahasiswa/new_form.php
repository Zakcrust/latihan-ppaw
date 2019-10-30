<!DOCTYPE html>
<html lang="en">

<head>
  <title>Mata Kuliah</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>

<body id="page-top">

	<div id="wrapper">

		<div id="content-wrapper">

			<div class="container-fluid">


				<?php if ($this->session->flashdata('success')): ?>
				<div class="alert alert-success" role="alert">
					<?php echo $this->session->flashdata('success'); ?>
				</div>
				<?php endif; ?>

				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('mahasiswa/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
					</div>
					<div class="card-body">

						<form action="<?php base_url('mahasiswa/add') ?>" method="post" enctype="multipart/form-data" >

							<div class="form-group">
								<label for="name">NIM*</label>
								<input class="form-control <?php echo form_error('nim') ? 'is-invalid':'' ?>"
								 type="number" name="nim" placeholder="Kode" />
								<div class="invalid-feedback">
									<?php echo form_error('nim') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="name">Nama*</label>
								<input class="form-control <?php echo form_error('mahasiswa_nama') ? 'is-invalid':'' ?>"
								 type="text" name="mahasiswa_nama" placeholder="Deskripsi"/>
								<div class="invalid-feedback">
									<?php echo form_error('mahasiswa_nama') ?>
								</div>
							</div>


							<div class="form-group">
								<label for="name">Tanggal Lahir</label>
								<input class="form-control <?php echo form_error('tanggal_lahir') ? 'is-invalid':'' ?>"
								 type="date" min="0" max="4" name="tanggal_lahir" placeholder="tanggal_lahir"/>
								<div class="invalid-feedback">
									<?php echo form_error('tanggal_lahir') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="name">Jenis Kelamin</label>
								<select name="jenis_kelamin" id="jenis_kelamin" placeholder="jenis_kelamin">
								<option value="'L'">L</option>
								<option value="'P'">P</option>	
							</select>
								<!-- <input class="form-control <?php echo form_error('jenis_kelamin') ? 'is-invalid':'' ?>"
								 type="date" min="0" max="4" name="tanggal_lahir" placeholder="tanggal_lahir" value="<?php echo $mahasiswa->jenis_kelamin ?>" /> -->
								<div class="invalid-feedback">
									<?php echo form_error('jenis_kelamin') ?>
								</div>
							</div>


							<input class="btn btn-success" type="submit" name="btn" value="Save" />
						</form>

					</div>

					<div class="card-footer small text-muted">
						* required fields
					</div>


				</div>
			</div>
		</div>

</body>

</html>
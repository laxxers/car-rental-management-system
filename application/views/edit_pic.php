<html>
<head>
<title>Upload Form</title>
</head>
<body>

<?php $id = $this->session->userdata('id'); ?>
<?php if(isset($error)){echo $error;}  ?>

<?php echo form_open_multipart('profile/do_upload');?>

<br />
<input type="file" name="userfile" size="20" />
<br />
<input type="submit" value="upload" />

</form>

</body>
</html>
<?php 
    if(isset($_SESSION['info'])){
        ?>
        <div class="alert alert-success text-center"> 
            <?php echo $_SESSION['info']; ?>
        </div> 
        <?php
    }
    ?>

<?php
    if(count($errors) > 0){
        ?>
			<div class="alert alert-danger text-center">
				<?php
				foreach($errors as $showerror){
			echo $showerror;
				}
				?>
			</div>
        <?php
    }
?>
    
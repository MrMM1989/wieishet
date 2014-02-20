	<div id="upload-form">
		
	<?php echo form_open_multipart('home/upload');?>
	<ul>
		<li>
			<label for="file">Kies een bestand: </label>
			<input type="file" id="file" name="file" />
		</li>
		<li>
			<label for="category">Selecteer een categorie voor je foto: </label>
			<select id="category">
				<option disabled>-- Selecteer een categorie --</option>
				<?php foreach($info as $line): ?>
					<option value="<?php echo $line['id'] ?>"><?php echo $line['name']; ?></option>
				<?php endforeach; ?>
			</select>
		</li>
	</ul>
	</form>
	</div><!-- end of div upload-form -->

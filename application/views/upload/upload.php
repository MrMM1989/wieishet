	<div id="upload-form">
		
	<?php $data = array (
			'id' => 'upload-form'
	);
	
	echo form_open_multipart('home/upload', $data);?>
	<ul>
		<li>
			<label for="file">Kies een foto: </label>
			<input type="file" id="file" name="file" />
		</li>
		<li>
			<label for="filename">Geef je foto een unieke naam: </label>
			<input type="text" id="filename" name="filename" placeholder="Typ hier de fotonaam" />
		</li>
		<li>
			<label for="category">Selecteer een categorie voor je foto: </label>
			<select id="category" name="category">
				<option disabled>-- Selecteer een categorie --</option>
				<?php foreach($info as $line): ?>
					<option value="<?php echo $line['id'] ?>"><?php echo $line['name']; ?></option>
				<?php endforeach; ?>
			</select>
		</li>
	</ul>
	</form>
	</div><!-- end of div upload-form -->

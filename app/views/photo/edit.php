<link rel="stylesheet" href="<?= BASE_URL ?>/css/style.css">

<h1>Edit Photo</h1>

<div style="text-align: center;">
  <img 
    src="<?= BASE_URL ?>/uploads/<?= htmlspecialchars($photo['filename'], ENT_QUOTES) ?>" 
    width="150" 
    alt="Current Photo" 
  />
</div>

<form 
  action="<?= BASE_URL ?>/photo/update/<?= $photo['id'] ?>" 
  method="POST" 
  enctype="multipart/form-data"
>
    <input type="file" name="photo" id="photoInput" required onchange="previewImage(event)">
    
    <div class="preview-container">
    <img id="preview" src="#" alt="New Preview" />
    </div>

    <br><br>
    <button type="submit">Update Photo</button>
</form>

<a href="<?= BASE_URL ?>/photo/index" class="back-link">← Back to List</a>

<script>
function previewImage(event) {
    const output = document.getElementById('preview');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.style.display = 'inline-block';  
}
</script>

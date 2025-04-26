<link rel="stylesheet" href="<?= BASE_URL ?>/css/style.css">

<h1>Upload New Photo</h1>

<form action="<?= BASE_URL ?>/photo/store" 
      method="post" 
      enctype="multipart/form-data">
      
    <input type="file" name="photo" required onchange="previewImage(event)">
    
    <br><br>

    <div class="preview-container">
    <img id="preview" src="#" alt="New Preview" />
    </div>
    
    <br><br>

    <button type="submit">Upload</button>
</form>

<script>
function previewImage(event) {
    var output = document.getElementById('preview');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.style.display = 'block';  
}
</script>

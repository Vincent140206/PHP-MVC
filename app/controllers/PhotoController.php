<?php
class PhotoController extends Controller {
    public function index() {
        $photo = $this->model('Photo');
        $data = $photo->all();
        $this->view('photo/index', ['photos' => $data]);
    }

    public function create() {
        $this->view('photo/create');
    }

    public function store() {
        $filename = $_FILES['photo']['name'];
        $temp     = $_FILES['photo']['tmp_name'];
    
        if (empty($filename)) {
            echo "No file selected!";
            exit;
        }
    
        $destination = __DIR__ . '/../../public/uploads/' . $filename;
    
        if (move_uploaded_file($temp, $destination)) {
            echo "File uploaded successfully!";
        } else {
            echo "Failed to upload file!";
        }

        $photo = $this->model('Photo');
        $photo->create($filename);
    
        header("Location: " . BASE_URL . "/photo/index");
        exit;
    }
    

    public function edit($id) {
        $photo = $this->model('Photo');
        $data = $photo->find($id);
        if ($data) {
            $this->view('photo/edit', ['photo' => $data]);
        } else {
            echo "Photo not found!";
            exit;
        }
    }
    

    public function update($id) {
        $photo = $this->model('Photo');
        $oldPhoto = $photo->find($id);
    
        if (!$oldPhoto) {
            echo "Photo not found!";
            exit;
        }
    
        if (isset($_FILES['photo']) && $_FILES['photo']['error'] === 0) {
            $filename = $_FILES['photo']['name'];
            $temp = $_FILES['photo']['tmp_name'];
            $destination = __DIR__ . '/../../public/uploads/' . $filename;
    
            if (move_uploaded_file($temp, $destination)) {
                unlink(__DIR__ . '/../../public/uploads/' . $oldPhoto['filename']);
            } else {
                echo "Failed to upload new photo!";
                exit;
            }
        } else {
            $filename = $oldPhoto['filename'];
        }
    
        $photo->update($id, $filename);
    
        header("Location: " . BASE_URL . "/photo/index");
        exit;
    }
    
    

    public function delete($id) {
        $photo = $this->model('Photo');
        $old = $photo->find($id);
    
        if ($old) {
            unlink("uploads/" . $old['filename']);  
            $photo->delete($id);  
        }
    
        header("Location: " . BASE_URL . "/photo/index");  
    }
    
}

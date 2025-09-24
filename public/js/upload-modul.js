document.addEventListener('DOMContentLoaded', function() {
  const uploadBox = document.getElementById('uploadBox');
  const fileInput = document.getElementById('fileInput');
  const browseBtn = document.getElementById('browseBtn');
  const uploadedFiles = document.getElementById('uploadedFiles');
  const noFiles = document.getElementById('noFiles');
  const fileItemTemplate = document.getElementById('fileItemTemplate');
  const saveBtn = document.getElementById('saveBtn');
  const uploadForm = document.getElementById('uploadForm');
  const successModal = document.getElementById('successModal');
  const modalCloseBtn = document.getElementById('modalCloseBtn');
  
  let currentFile = null;

  browseBtn.addEventListener('click', () => fileInput.click());
  fileInput.addEventListener('change', handleFileSelect);
  modalCloseBtn.addEventListener('click', () => successModal.classList.add('hidden'));
  successModal.addEventListener('click', (e) => {
    if (e.target === successModal) successModal.classList.add('hidden');
  });

  uploadBox.addEventListener('dragover', (e) => {
    e.preventDefault();
    uploadBox.classList.add('drag-over');
  });

  uploadBox.addEventListener('dragleave', () => {
    uploadBox.classList.remove('drag-over');
  });

  uploadBox.addEventListener('drop', (e) => {
    e.preventDefault();
    uploadBox.classList.remove('drag-over');
    if (e.dataTransfer.files.length) {
      fileInput.files = e.dataTransfer.files;
      handleFileSelect({ target: fileInput });
    }
  });

  uploadForm.addEventListener('submit', async function(e) {
    e.preventDefault();
    
    if (!currentFile) {
        alert('Silakan pilih file terlebih dahulu');
        return;
    }

    try {
        saveBtn.disabled = true;
        saveBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i> Menyimpan...';
        
        const formData = new FormData(uploadForm);
        
        const response = await fetch(uploadForm.action, {
            method: 'POST',
            body: formData,
            headers: {
                'Accept': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            }
        });

        const data = await response.json();
        
        if (!response.ok) {
            throw new Error(data.message || 'Upload gagal');
        }

        successModal.classList.remove('hidden');
        resetForm();
        setTimeout(() => {
          window.location.href = "{{ route('modul.index') }}";
        }, 1500);
    } catch (error) {
        console.error('Upload error:', error);
        alert(`Error: ${error.message}`);
    } finally {
        saveBtn.disabled = false;
        saveBtn.innerHTML = '<i class="fas fa-save mr-2"></i> Simpan Modul';
    }
  });

  function handleFileSelect(event) {
    const file = event.target.files[0];
    if (!file) return;
    
    const validTypes = [
      'application/pdf',
      'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
      'application/vnd.openxmlformats-officedocument.presentationml.presentation'
    ];
    
    if (!validTypes.includes(file.type)) {
      alert('Format file tidak didukung. Harap upload file PDF, DOCX, atau PPTX.');
      return;
    }
    
    if (file.size > 50 * 1024 * 1024) {
      alert('Ukuran file terlalu besar. Maksimal 50MB.');
      return;
    }
    
    currentFile = file;
    displayFileInfo(file);
    saveBtn.disabled = false;
  }

  function displayFileInfo(file) {
    noFiles.classList.add('hidden');
    
    const fileItem = fileItemTemplate.cloneNode(true);
    fileItem.classList.remove('hidden');
    fileItem.id = '';

    const fileName = fileItem.querySelector('.file-name');
    const fileSize = fileItem.querySelector('.file-size');
    const fileIcon = fileItem.querySelector('.fa-file-pdf');
    
    fileName.textContent = file.name;
    fileSize.textContent = formatFileSize(file.size);
    
    // Set icon based on file type
    if (file.type.includes('wordprocessingml')) {
      fileIcon.classList.replace('fa-file-pdf', 'fa-file-word');
      fileIcon.classList.add('text-blue-600');
    } else if (file.type.includes('presentationml')) {
      fileIcon.classList.replace('fa-file-pdf', 'fa-file-powerpoint');
      fileIcon.classList.add('text-orange-600');
    } else {
      fileIcon.classList.add('text-red-600');
    }
    
    // Remove button handler
    fileItem.querySelector('.file-remove').addEventListener('click', () => {
      fileItem.remove();
      currentFile = null;
      fileInput.value = '';
      saveBtn.disabled = true;
      if (uploadedFiles.children.length === 1) {
        noFiles.classList.remove('hidden');
      }
    });
    
    // Clear existing and add new
    uploadedFiles.innerHTML = '';
    uploadedFiles.appendChild(noFiles);
    uploadedFiles.appendChild(fileItem);
  }

  // Helper Functions
  function formatFileSize(bytes) {
    if (bytes === 0) return '0 Bytes';
    const k = 1024;
    const sizes = ['Bytes', 'KB', 'MB', 'GB'];
    const i = Math.floor(Math.log(bytes) / Math.log(k));
    return parseFloat((bytes / Math.pow(k, i))).toFixed(1) + ' ' + sizes[i];
  }

  function resetForm() {
    uploadForm.reset();
    uploadedFiles.innerHTML = '';
    uploadedFiles.appendChild(noFiles);
    noFiles.classList.remove('hidden');
    currentFile = null;
  }
});
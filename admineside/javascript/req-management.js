// Handle Upload button click
function handleUpload() {
  // This will open the file picker for actual upload
  const input = document.createElement('input');
  input.type = 'file';
  input.accept = '.pdf,.jpg,.png,.docx';
  input.onchange = () => {
    alert(`File selected: ${input.files[0].name}`);
  };
  input.click();
}

// Handle Complete button click
function handleComplete() {
  alert("Status set to Complete!");
}

// Handle In Progress button click
function handleProgress() {
  alert("Status set to In Progress!");
}

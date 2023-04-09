var modal = document.getElementById('qalampirModal');

function showModal() {
  document.getElementById('qalampirModal').style.display = 'flex';
  document.body.style.overflow = 'hidden';
}

function closeQalampirModal() {
  document.getElementById('qalampirModal').style.display = 'none';
  document.body.style.overflow = 'auto';
}

window.onclick = function (event) {
  if (event.target == modal) {
    modal.style.display = 'none';
  }
};

setTimeout(() => {
  closeQalampirModal();
}, 10000);

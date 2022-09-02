const btn = document.getElementById('btn');

btn.addEventListener('click', () => 
{
  const form = document.getElementById('resForm');

  if (form.style.display === 'none') {
    // 👇️ this SHOWS the form
    form.style.display = 'block';
  } else {
    // 👇️ this HIDES the form
    form.style.display = 'none';
  }
}
    );
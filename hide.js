const btn = document.getElementById('btn');

btn.addEventListener('click', () => 
{
  const form = document.getElementById('resForm');

  if (form.style.visibility === 'hidden') 
  {
    form.style.visibility = 'visible';
  } 
  else 
  {
    form.style.visibility = 'hidden';
  }
}
    );
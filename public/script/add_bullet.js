



const addBulletBtn = document.getElementById('addBulletBtn');
const bulletList = document.getElementById('bulletList');

addBulletBtn.addEventListener('click', () => {
    const newBullet = document.createElement('li');
    newBullet.classList.add('bullet-item');
    newBullet.innerHTML = `
      <input type="text" placeholder="Zadajte text odrážky">
      <button class="removeBullet">Odstrániť</button>
    `;

    bulletList.appendChild(newBullet);

    newBullet.querySelector('.removeBullet').addEventListener('click', () => {
        bulletList.removeChild(newBullet);
    });
});
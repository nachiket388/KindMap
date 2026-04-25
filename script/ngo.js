
function switchTab(tab) {
  document.querySelectorAll('.ftab').forEach((t,i) =>
    t.classList.toggle('active', (tab==='login'&&i===0)||(tab==='register'&&i===1))
  );
  document.getElementById('loginView').classList.toggle('active', tab==='login');
  document.getElementById('registerView').classList.toggle('active', tab==='register');
  document.getElementById('panelLogin').style.display = tab==='login' ? 'block' : 'none';
  document.getElementById('panelRegister').style.display = tab==='register' ? 'block' : 'none';
}

function togglePw(id, btn) {
  const inp = document.getElementById(id);
  inp.type = inp.type === 'password' ? 'text' : 'password';
  btn.textContent = inp.type === 'password' ? '👁' : '🙈';
}

function toggleChip(el) { el.classList.toggle('selected'); }

function previewLogo(inp) {
  if (!inp.files[0]) return;
  const reader = new FileReader();
  reader.onload = e => {
    const preview = document.getElementById('logoPreview');
    preview.innerHTML = `<img src="${e.target.result}" style="width:100%;height:100%;object-fit:cover;">`;
  };
  reader.readAsDataURL(inp.files[0]);
}

function showDashboard(orgName, isNew) {
  // Hide tabs and form views
  document.getElementById('formTabs').style.display = 'none';
  document.getElementById('loginView').classList.remove('active');
  document.getElementById('registerView').classList.remove('active');

  // Switch left panel
  document.getElementById('panelLogin').style.display = 'none';
  document.getElementById('panelRegister').style.display = 'none';
  document.getElementById('panelDash').style.display = 'block';
  document.getElementById('dashPanelName').textContent = orgName || 'Your NGO';
  if (isNew) document.getElementById('dashPanelSub').textContent = 'Your account is live — post your first task and start reaching volunteers.';

  // Update nav
  const back = document.getElementById('navBack');
  back.textContent = 'Sign out';
  back.href = '#';
  back.onclick = e => { e.preventDefault(); location.reload(); };

  // Update dashboard header
  if (isNew) {
    document.getElementById('dashWelcome').textContent = "You're live! 🎉";
    document.getElementById('dashSub').textContent = 'Your NGO profile is active. Post a task to start receiving volunteers.';
  } else {
    document.getElementById('dashWelcome').textContent = `Welcome back 👋`;
  }

  // Show dashboard
  document.getElementById('dashboardView').style.display = 'flex';
  document.getElementById('dashboardView').style.flexDirection = 'column';
}

function handleLogin(e) {
  e.preventDefault();

  // optional validation
  const email = document.getElementById('loginEmail').value;
  const password = document.getElementById('loginPw').value;

  if (email && password) {
    window.location.href = "ngo_dashboard.php"; // ✅ redirect
  }
}

function handleRegister(e) {
  e.preventDefault();
  const name = document.getElementById('orgName').value;
  showDashboard(name, true);
}

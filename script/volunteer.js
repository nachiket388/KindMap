
// Tab switching
function switchTab(tab) {
  const tabs = document.querySelectorAll('.ftab');
  tabs.forEach((t,i) => t.classList.toggle('active', (tab==='login'&&i===0)||(tab==='register'&&i===1)));
  document.getElementById('loginView').classList.toggle('active', tab==='login');
  document.getElementById('registerView').classList.toggle('active', tab==='register');
  document.getElementById('panelLogin').style.display = tab==='login' ? 'block' : 'none';
  document.getElementById('panelRegister').style.display = tab==='register' ? 'block' : 'none';
}

// Google login mock
function handleGoogleLogin() {
  alert('Google OAuth: In production this redirects to /auth/google.php');
}

// Password toggle
function togglePw(id, btn) {
  const inp = document.getElementById(id);
  inp.type = inp.type === 'password' ? 'text' : 'password';
  btn.textContent = inp.type === 'password' ? '👁' : '🙈';
}

// Password strength
function checkStrength(inp) {
  const v = inp.value;
  let score = 0;
  if (v.length >= 8) score++;
  if (/[A-Z]/.test(v)) score++;
  if (/[0-9]/.test(v)) score++;
  if (/[^A-Za-z0-9]/.test(v)) score++;
  const fill = document.getElementById('strengthFill');
  const colors = ['','#ef4444','#f97316','#eab308','#3d6b4f'];
  const widths = ['0%','25%','50%','75%','100%'];
  fill.style.width = widths[score];
  fill.style.background = colors[score];
}

// Skill / cause chips
function toggleChip(el) {
  el.classList.toggle('selected');
}

// Multi-step register
let currentStep = 0;
const labels = ['Step 1 of 3 — Basic info','Step 2 of 3 — Your profile','Step 3 of 3 — Availability'];

function nextStep(step) {
  document.getElementById('step'+currentStep).classList.remove('active');
  document.getElementById('dot'+currentStep).classList.remove('active');
  document.getElementById('dot'+currentStep).classList.add('done');
  currentStep = step;
  if (step <= 2) {
    document.getElementById('step'+step).classList.add('active');
    document.getElementById('dot'+step).classList.add('active');
    document.getElementById('dot'+step).classList.remove('done');
    document.getElementById('stepLabel').textContent = labels[step];
  }
  // going back fix
  if (step < currentStep) {
    document.getElementById('dot'+(step+1))?.classList.remove('done');
  }
}

function submitRegister() {
  document.getElementById('step2').classList.remove('active');
  document.getElementById('dot2').classList.remove('active');
  document.getElementById('dot2').classList.add('done');
  document.getElementById('stepSuccess').classList.add('active');
  document.getElementById('regNote').style.display = 'none';
  document.getElementById('stepLabel').textContent = 'All done! 🎉';
}

function handleLogin(e) {
  e.preventDefault();
    window.location.href = "vol_dashboard.php"; // ✅ redirect
}

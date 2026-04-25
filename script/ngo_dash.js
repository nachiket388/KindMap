
// ── Navigation
function showPage(id, el) {
  document.querySelectorAll('.page').forEach(p => p.classList.remove('active'));
  document.querySelectorAll('.nav-item').forEach(n => n.classList.remove('active'));
  document.getElementById('page-' + id).classList.add('active');
  if (el) el.classList.add('active');
  const titles = {dashboard:'Dashboard',post:'Post a task',board:'Task board',slots:'Volunteer slots',analytics:'Analytics',report:'AI weekly report',scope:'Impact scope'};
  document.getElementById('page-title').textContent = titles[id] || id;
  // Animate bars on page change
  setTimeout(animateBars, 100);
  // Build bar chart if analytics
  if (id === 'analytics') buildBarChart();
}

// ── Animate progress bars
function animateBars() {
  document.querySelectorAll('[data-w]').forEach(el => {
    el.style.width = el.dataset.w + '%';
  });
}
setTimeout(animateBars, 400);

// ── Filter chips
function toggleChip(el) { el.classList.toggle('on'); }

// ── Urgency toggle
let currentUrgency = 'Normal';
function setUrgency(el, val) {
  document.querySelectorAll('.urgency-opt').forEach(o => o.classList.remove('on'));
  el.classList.add('on');
  currentUrgency = val;
  updatePreview();
}

// ── Impact preview updater
function updatePreview() {
  const slots = parseInt(document.getElementById('taskSlots').value) || 15;
  const pts = parseInt(document.getElementById('taskPts').value) || 120;
  document.getElementById('prevVols').textContent = '~' + Math.round(slots * 2.8);
  document.getElementById('prevFill').textContent = '~' + (slots > 20 ? '14h' : slots > 10 ? '8h' : '4h');
  document.getElementById('prevPts').textContent = (slots * pts).toLocaleString();
  document.getElementById('prevMatch').textContent = Math.min(98, 85 + Math.floor(Math.random() * 10)) + '%';
}

// ── AI description generator
function simulateAI() {
  const loader = document.getElementById('ai-load');
  const area = document.getElementById('desc-area');
  const title = document.getElementById('taskTitle').value || 'this task';
  loader.classList.add('show');
  area.value = '';
  setTimeout(() => {
    loader.classList.remove('show');
    const text = `Join Prayas Foundation for "${title}" — a hands-on opportunity to make a direct difference in Kolkata.

As a volunteer, you'll work alongside our team and fellow community members to complete meaningful, structured work. No prior experience is needed — just show up with a positive attitude and willingness to help. All materials, briefing, and coordination will be provided on-site.

This is a ${document.querySelector('.form-input[type=number]')?.value || '3'}-hour commitment. Volunteers who complete this task earn ${document.getElementById('taskPts')?.value || '120'} KindMap points and a digital certificate of participation that can be added to your LinkedIn profile.

Together, every hour of your time creates measurable change in our city.`;
    let i = 0;
    const interval = setInterval(() => {
      area.value = text.slice(0, i);
      i += 5;
      if (i > text.length) clearInterval(interval);
    }, 10);
  }, 1600);
}

// ── Submit task
function submitTask() {
  document.getElementById('postForm').style.display = 'none';
  document.getElementById('postSuccess').classList.add('show');
}
function resetPost() {
  document.getElementById('postForm').style.display = 'block';
  document.getElementById('postSuccess').classList.remove('show');
  document.getElementById('taskTitle').value = '';
  document.getElementById('desc-area').value = '';
}

// ── Volunteer slots table
const volunteers = [
  {name:'Arjun Das',loc:'Salt Lake',skills:['Teaching','Logistics'],checkin:'9:02 AM',status:'confirmed'},
  {name:'Priya Sharma',loc:'Park Street',skills:['First aid','Bengali'],checkin:'9:08 AM',status:'confirmed'},
  {name:'Rohit Sen',loc:'Howrah',skills:['Driving'],checkin:'—',status:'pending'},
  {name:'Meera Bose',loc:'Jadavpur',skills:['Cooking','Organising'],checkin:'9:15 AM',status:'confirmed'},
  {name:'Aniket Roy',loc:'Dum Dum',skills:['Tech / IT','Teaching'],checkin:'—',status:'pending'},
  {name:'Tanisha Das',loc:'Behala',skills:['Bengali','Hindi'],checkin:'9:11 AM',status:'done'},
  {name:'Shalini Gupta',loc:'New Town',skills:['Photography'],checkin:'9:20 AM',status:'confirmed'},
  {name:'Debashis Roy',loc:'Alipore',skills:['Logistics'],checkin:'—',status:'pending'},
];
function renderSlots(data) {
  document.getElementById('slots-body').innerHTML = data.map((v,i) => `
    <tr>
      <td><div class="vol-row"><div class="vol-av">${v.name[0]}</div><div><div class="vol-name">${v.name}</div><div class="vol-meta">📍 ${v.loc}</div></div></div></td>
      <td>${v.skills.map(s=>`<span class="skill-pill">${s}</span>`).join('')}</td>
      <td style="font-size:13px;color:rgba(13,17,23,.5)">${v.checkin}</td>
      <td><span class="status-badge sb-${v.status}">${v.status}</span></td>
      <td><button class="mark-btn" ${v.status==='done'?'disabled':''} onclick="markDone(this,${volunteers.indexOf(v)})">${v.status==='done'?'✓ Done':'Mark done'}</button></td>
    </tr>`).join('');
}
renderSlots(volunteers);
function markDone(btn, i) {
  volunteers[i].status = 'done';
  volunteers[i].checkin = new Date().toLocaleTimeString([],{hour:'2-digit',minute:'2-digit'});
  renderSlots(volunteers);
  showToast('✅ ' + volunteers[i].name + ' marked as completed');
}
function filterSlots(q) {
  const filtered = volunteers.filter(v => v.name.toLowerCase().includes(q.toLowerCase()) || v.loc.toLowerCase().includes(q.toLowerCase()));
  renderSlots(filtered);
}
function markAllPresent() {
  volunteers.forEach(v => { if(v.status !== 'done') { v.status = 'confirmed'; v.checkin = '9:00 AM'; } });
  renderSlots(volunteers);
  showToast('✅ All volunteers confirmed present');
}

// ── Bar chart
function buildBarChart() {
  const data = [12,19,14,28,22,35,48];
  const labels = ['Feb 24','Mar 3','Mar 10','Mar 17','Mar 24','Apr 7','Apr 14'];
  const max = Math.max(...data);
  const chart = document.getElementById('barChart');
  const labelsEl = document.getElementById('barLabels');
  if (!chart || chart.children.length) return;
  data.forEach((v,i) => {
    const bar = document.createElement('div');
    bar.className = 'bc-bar' + (i === data.length-1 ? ' highlight' : '');
    bar.style.height = Math.round(v/max*100) + '%';
    bar.innerHTML = `<div class="bc-tip">${v} volunteers</div>`;
    chart.appendChild(bar);
    const lbl = document.createElement('div');
    lbl.className = 'bc-lbl';
    lbl.textContent = labels[i].split(' ')[1];
    labelsEl.appendChild(lbl);
  });
}

// ── AI Report generator
function generateReport() {
  const strip = document.getElementById('reportGenStrip');
  strip.innerHTML = `<div class="rg-icon" style="animation:float 1s ease infinite">✦</div><div class="rg-text"><h4>Claude is analysing your data…</h4><p>Reading task completion rates, volunteer feedback, and community trends.</p></div><div style="margin-left:auto"><div class="dot-loader"><span></span><span></span><span></span></div></div>`;
  setTimeout(() => {
    strip.style.display = 'none';
    const card = document.getElementById('reportCard');
    card.style.display = 'block';
    card.style.animation = 'fadeUp .4s ease both';
    // Type summary
    const summary = `This was a strong week for Prayas Foundation. Five active tasks attracted 48 volunteers across Kolkata, contributing 94 hours of community service. Volunteer engagement is up 18% compared to last week, driven largely by the flood relief task which filled 72% of slots within 6 hours — the fastest fill rate in your organisation's history on KindMap.

Volunteer satisfaction scores remain high at 4.8/5 across all completed tasks, with feedback consistently praising clear on-site coordination and communication.`;
    let i = 0;
    const el = document.getElementById('reportSummary');
    const interval = setInterval(() => {
      el.textContent = summary.slice(0,i);
      i += 4;
      if (i > summary.length) { clearInterval(interval); buildInsights(); buildTopVols(); }
    }, 12);
  }, 2200);
}

function buildInsights() {
  const insights = [
    {text:'Volunteers with <strong>teaching skills</strong> are your most-requested profile. Demand is outpacing supply by 2.3× — consider posting more education-focused tasks.'},
    {text:'Tasks posted <strong>before 9 AM on weekdays</strong> receive 40% more applications in the first 3 hours. Schedule your next posting for Monday morning.'},
    {text:'<strong>Salt Lake and Tollygunge</strong> are your top volunteer catchment zones — tasks here fill 2× faster than outer neighbourhoods.'},
    {text:'Your average task rating this week was <strong>4.8 / 5</strong> — the highest since October 2025. Volunteers praised clear instructions and on-site coordination.'},
  ];
  document.getElementById('reportInsights').innerHTML = insights.map(ins => `
    <div class="insight-item"><div class="insight-dot"></div><span>${ins.text}</span></div>
  `).join('');
}
function buildTopVols() {
  const vols = [
    {name:'Priya Sharma',tasks:3,hrs:6,pts:380},
    {name:'Meera Bose',tasks:2,hrs:4,pts:260},
    {name:'Arjun Das',tasks:2,hrs:'3.5',pts:230},
  ];
  document.getElementById('report-vols').innerHTML = vols.map((v,i) => `
    <div style="display:flex;align-items:center;gap:14px;padding:12px 0;border-bottom:1px solid var(--border);${i===vols.length-1?'border:none':''}">
      <div style="font-size:18px;width:28px;text-align:center">${['🥇','🥈','🥉'][i]}</div>
      <div style="width:36px;height:36px;border-radius:50%;background:var(--sage-pale);display:flex;align-items:center;justify-content:center;font-size:14px;font-weight:600;color:var(--sage)">${v.name[0]}</div>
      <div style="flex:1"><div style="font-size:14px;font-weight:500">${v.name}</div><div style="font-size:12px;color:rgba(13,17,23,.4)">${v.tasks} tasks · ${v.hrs} hrs</div></div>
      <div style="font-size:14px;font-weight:600;color:var(--gold)">⭐ ${v.pts}</div>
    </div>`).join('');
}

// ── Modal
function openEditModal() { document.getElementById('editModal').classList.add('open'); }
function closeEditModal() { document.getElementById('editModal').classList.remove('open'); }

// ── Toast
function showToast(msg) {
  const t = document.getElementById('toast');
  document.getElementById('toastMsg').textContent = msg;
  t.classList.add('show');
  setTimeout(() => t.classList.remove('show'), 3000);
}

// ── Float animation for scope page icons
const floatStyle = `@keyframes float{0%,100%{transform:translateY(0)}50%{transform:translateY(-5px)}}`;
const st = document.createElement('style'); st.textContent = floatStyle; document.head.appendChild(st);

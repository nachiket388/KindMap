
const state = {
  pts: 840,
  tasks: 12,
  hrs: 38,
  rank: 14,
};

// ── PAGE NAVIGATION ──
function showPage(id, el) {
  document.querySelectorAll('.page').forEach(p => p.classList.remove('active'));
  document.querySelectorAll('.nav-item').forEach(n => n.classList.remove('active'));
  const page = document.getElementById('page-' + id);
  if (page) page.classList.add('active');
  if (el) el.classList.add('active');
  const titles = {browse:'Browse tasks',mytasks:'My tasks',profile:'My profile',leaderboard:'Leaderboard',impactmap:'Impact map',badges:'Badges'};
  document.getElementById('page-title').textContent = titles[id] || 'KindMap';
  if (id === 'browse') animateBars();
  if (id === 'impactmap') animateImapBars();
  if (id === 'badges') animateBadgeBars();
  if (id === 'leaderboard') renderLeaderboard();
}

// ── FILTER CHIPS ──
function filterChip(chip, category) {
  chip.closest('.filter-row').querySelectorAll('.filter-chip').forEach(c => c.classList.remove('on'));
  chip.classList.add('on');
  document.querySelectorAll('#taskGrid .task-card').forEach(card => {
    card.style.display = (category === 'All' || category === 'Near' || card.dataset.category === category) ? '' : 'none';
  });
}

// ── IMPACT MAP FILTER ──
function filterMap(chip, category) {
  chip.closest('.imap-filters').querySelectorAll('.filter-chip').forEach(c => c.classList.remove('on'));
  chip.classList.add('on');
  document.querySelectorAll('#imapCanvas .imap-pin').forEach(pin => {
    pin.style.display = (category === 'all' || pin.dataset.cat === category) ? '' : 'none';
  });
}

// ── PIN DETAIL ──
function showPinDetail(name, loc, date, pts, cat, emoji) {
  document.getElementById('imapDetailEmpty').style.display = 'none';
  document.getElementById('imapDetailContent').style.display = 'block';
  document.getElementById('pinEmoji').textContent = emoji;
  document.getElementById('pinName').textContent = name;
  document.getElementById('pinLoc').textContent = '📍 ' + loc;
  document.getElementById('pinCat').textContent = cat;
  document.getElementById('pinDate').textContent = date;
  document.getElementById('pinPts').textContent = '⭐ ' + pts + ' pts';
}

// ── SAVE TOGGLE ──
function toggleSave(btn) {
  btn.classList.toggle('saved');
  btn.textContent = btn.classList.contains('saved') ? '♥' : '♡';
  if (btn.classList.contains('saved')) {
    const name = btn.closest('.task-card').querySelector('.task-name').textContent;
    showToast('Saved: ' + name, '');
  }
}

// ── MY TASKS TAB FILTER ──
function filterTasks(status, tab) {
  tab.closest('.tab-row').querySelectorAll('.tab').forEach(t => t.classList.remove('active'));
  tab.classList.add('active');
  document.querySelectorAll('.my-task').forEach(t => {
    t.style.display = (status === 'all' || t.dataset.status === status) ? 'flex' : 'none';
  });
}

// ── CHECK-IN MODAL ──
let pendingPts = '0', pendingCard = null, pendingName = '', pendingLoc = '';

function openCheckin(name, loc, pts, card) {
  document.getElementById('modalTaskName').textContent = name;
  document.getElementById('modalTaskLoc').textContent = '📍 ' + loc;
  document.getElementById('modalTaskPts').textContent = '⭐ ' + pts + ' pts';
  pendingPts = pts; pendingCard = card; pendingName = name; pendingLoc = loc;
  document.getElementById('modal').classList.add('open');
}

function closeCheckin() {
  document.getElementById('modal').classList.remove('open');
}

function confirmCheckin() {
  closeCheckin();
  const earned = parseInt(pendingPts);
  state.pts += earned;
  state.tasks += 1;
  updateStats();
  if (pendingCard) {
    pendingCard.classList.add('accepted');
    const btn = pendingCard.querySelector('.btn-accept');
    if (btn) { btn.textContent = '✓ Joined'; btn.classList.add('btn-filled'); }
  }
  addToMyTasks(pendingName, pendingLoc, pendingPts);
  addToFeed('#c9922a', 'A', `<strong>You</strong> just checked in at ${pendingName} in ${pendingLoc}<span class="feed-action">+${pendingPts} pts</span>`, 'Just now');
  showToast('Checked in! See you there 🎉', pendingPts);
}

// ── BADGE MODAL ──
function showBadgeDetail(name, desc, emoji, status, note, earned) {
  document.getElementById('bdEmoji').textContent = emoji;
  document.getElementById('bdName').textContent = name;
  document.getElementById('bdStatus').textContent = status;
  document.getElementById('bdStatus').style.color = earned ? 'var(--gold)' : 'rgba(13,17,23,0.4)';
  document.getElementById('bdDesc').textContent = desc;
  document.getElementById('bdNote').textContent = note;
  document.getElementById('badgeModal').classList.add('open');
}

function closeBadgeModal() {
  document.getElementById('badgeModal').classList.remove('open');
}

// ── UPDATE STATS ──
function updateStats() {
  const pf = state.pts.toLocaleString();
  document.getElementById('statPts').textContent = pf;
  document.getElementById('statTasks').textContent = state.tasks;
  document.getElementById('profilePts').textContent = pf;
  document.getElementById('profileTasks').textContent = state.tasks;
  document.getElementById('sidebarPts').textContent = '⭐ ' + pf + ' points';
  document.getElementById('miniPts').textContent = '⭐ ' + pf;
  document.getElementById('badgePagePts').textContent = pf;
  if (document.getElementById('bpTasksDone')) {
    document.getElementById('bpTasksDone').textContent = state.tasks;
    const left = Math.max(0, 15 - state.tasks);
    document.getElementById('bpTasksLeft').textContent = left;
    document.getElementById('bpFill').style.width = Math.min(100, (state.tasks/15)*100) + '%';
  }
  if (state.tasks >= 15) {
    const b = document.getElementById('badge15');
    if (b) { b.classList.add('earned'); b.querySelector('.badge-name').style.color = 'var(--gold)'; }
  }
  if (state.pts >= 1000) {
    const fill = document.getElementById('ptsBadgeFill');
    const label = document.getElementById('ptsBadgeLabel');
    if (fill) fill.style.width = '100%';
    if (label) label.textContent = state.pts + ' / 1000 ✓';
  }
  if (state.pts >= 900 && state.rank > 13) {
    state.rank = 13;
    document.getElementById('statRank').textContent = '#' + state.rank;
    document.getElementById('profileRank').textContent = '#' + state.rank;
    document.getElementById('sidebarRank').textContent = '#' + state.rank;
    document.getElementById('miniRank').textContent = state.rank;
    showToast('You moved up to rank #' + state.rank + '! 🚀', '');
  }
}

// ── ADD TO MY TASKS ──
function addToMyTasks(name, loc, pts) {
  const list = document.getElementById('myTaskList');
  const el = document.createElement('div');
  el.className = 'my-task'; el.dataset.status = 'active';
  el.innerHTML = `<div class="my-task-dot dot-active"></div><div class="my-task-info"><div class="my-task-name">${name}</div><div class="my-task-meta">📍 ${loc} &nbsp;·&nbsp; Joined now</div></div><span class="my-task-pts">⭐ ${pts}</span><span class="status-pill sp-active">Active</span><button class="btn-checkin" onclick="openCheckin('${name}','${loc}','${pts}',null)">Check in</button>`;
  list.insertBefore(el, list.firstChild);
}

// ── LIVE FEED ──
function addToFeed(color, init, text, time) {
  const fl = document.getElementById('feedList');
  if (!fl) return;
  const el = document.createElement('div');
  el.className = 'feed-item';
  el.innerHTML = `<div class="feed-av" style="background:${color}">${init}</div><div class="feed-content"><div class="feed-text">${text}</div><div class="feed-time">${time}</div></div>`;
  fl.insertBefore(el, fl.firstChild);
  if (fl.children.length > 7) fl.removeChild(fl.lastChild);
}

// ── TOAST ──
function showToast(msg, pts) {
  const t = document.getElementById('toast');
  document.getElementById('toastMsg').textContent = msg;
  const ptsEl = document.getElementById('toastPts');
  if (pts) { ptsEl.textContent = '+' + pts + ' pts'; ptsEl.style.display = 'inline'; }
  else { ptsEl.style.display = 'none'; }
  t.classList.add('show');
  setTimeout(() => t.classList.remove('show'), 3200);
}

// ── ANIMATE BARS ──
function animateBars() {
  document.querySelectorAll('.task-fill').forEach(b => {
    const w = b.dataset.w;
    if (w) setTimeout(() => b.style.width = w + '%', 300);
  });
}

function animateImapBars() {
  document.querySelectorAll('.imap-cat-fill').forEach(b => {
    const w = b.dataset.w;
    const c = b.dataset.color;
    if (w) {
      if (c) b.style.background = c;
      setTimeout(() => b.style.width = w + '%', 300);
    }
  });
}

function animateBadgeBars() {
  const fill = document.getElementById('bpFill');
  if (fill) setTimeout(() => fill.style.width = fill.dataset.w + '%', 300);
}

animateBars();

// ── LEADERBOARD ──
const leaders = [
  {name:'Priya Sharma',pts:1420,tasks:24,rank:1,av:'#4a7d5e',you:false},
  {name:'Rohit Sen',pts:1280,tasks:21,rank:2,av:'#7c6bb5',you:false},
  {name:'Meera Bose',pts:1100,tasks:19,rank:3,av:'#b05e35',you:false},
  {name:'Aniket Roy',pts:980,tasks:16,rank:4,av:'#3d6b4f',you:false},
  {name:'Tanisha Das',pts:920,tasks:15,rank:5,av:'#c9922a',you:false},
  {name:'Shalini Gupta',pts:870,tasks:13,rank:6,av:'#8d4f6b',you:false},
  {name:'Debashis Roy',pts:855,tasks:13,rank:7,av:'#4a6b9b',you:false},
  {name:'Kavya Iyer',pts:830,tasks:12,rank:8,av:'#6b4a7d',you:false},
  {name:'Suresh Nair',pts:810,tasks:12,rank:9,av:'#7d6b4a',you:false},
  {name:'Riya Ghosh',pts:795,tasks:11,rank:10,av:'#4a7d7d',you:false},
  {name:'Amit Biswas',pts:780,tasks:11,rank:11,av:'#7d4a4a',you:false},
  {name:'Pooja Lahiri',pts:765,tasks:10,rank:12,av:'#4a6b7d',you:false},
  {name:'Nikhil Das',pts:850,tasks:11,rank:13,av:'#5a7d4a',you:false},
  {name:'Arjun Das',pts:840,tasks:12,rank:14,av:'var(--sage)',you:true},
];
const medals = ['🥇','🥈','🥉'];

function renderLeaderboard() {
  leaders[13].pts = state.pts;
  leaders[13].tasks = state.tasks;
  leaders[13].rank = state.rank;
  document.getElementById('lbFullList').innerHTML = leaders.map(l => `
    <div class="lb-full-item ${l.you?'you':''}">
      <div class="lb-full-rank ${l.rank<=3?['gold','silver','bronze'][l.rank-1]:''}">${l.rank<=3?medals[l.rank-1]:l.rank}</div>
      <div class="lb-full-av" style="background:${l.av}">${l.name[0]}</div>
      <div class="lb-full-info">
        <div class="lb-full-name">${l.name}${l.you?' <span style="font-size:10px;background:var(--sage);color:#fff;padding:2px 7px;border-radius:100px;margin-left:6px">you</span>':''}</div>
        <div class="lb-full-tasks">${l.tasks} tasks completed</div>
      </div>
      <div class="lb-full-pts">⭐ ${l.pts.toLocaleString()}</div>
    </div>`).join('');
}
renderLeaderboard();

// ── AI CHAT ──
let chatOpen = false;
const chatPanel = document.getElementById('chatPanel');
const chatOverlay = document.getElementById('chatOverlay');

function toggleChat() {
  chatOpen = !chatOpen;
  chatPanel.classList.toggle('open', chatOpen);
  chatOverlay.style.pointerEvents = chatOpen ? 'auto' : 'none';
  if (chatOpen) document.getElementById('chatInput').focus();
}

const aiResponses = [
  `Based on your <strong>Teaching</strong> skill and Salt Lake location, I'd strongly recommend the <strong>digital literacy task at Park Street</strong> on Saturday. Only 4 of 10 slots filled — perfect timing! 📚`,
  `You're <strong>${1000 - state.pts} pts</strong> away from the 1000-point badge! The <strong>flood relief task tomorrow</strong> gives 200 pts and matches your logistics skill.`,
  `I found <strong>3 tasks this weekend</strong> within 5 km of you with combined value of <strong>400 pts</strong>. The meal drive, digital literacy, and tree plantation all match your profile.`,
  `Your most active time is <strong>Thursday evenings</strong> based on your history. The after-school tutoring in Behala fits perfectly — 2 km away and just 1.5 hrs. 🗺️`,
  `You've completed <strong>${state.tasks} tasks</strong> so far — incredible! You need <strong>${Math.max(0,15-state.tasks)} more</strong> to unlock the 🏅 15-tasks badge.`,
  `The <strong>tree plantation at Rabindra Sarobar</strong> is a great match for your Eco Warrior badge. Sunday, Apr 20 — only 5 of 25 slots taken. Lots of room! 🌱`,
];
let aiIdx = 0;

function sendChatMsg(presetMsg) {
  const input = document.getElementById('chatInput');
  const msgs = document.getElementById('chatMsgs');
  const text = presetMsg || input.value.trim();
  if (!text) return;
  input.value = '';
  msgs.querySelectorAll('.msg-suggestion').forEach(s => s.remove());
  const userMsg = document.createElement('div');
  userMsg.className = 'msg msg-user';
  userMsg.textContent = text;
  msgs.appendChild(userMsg);
  msgs.scrollTop = msgs.scrollHeight;
  const typing = document.createElement('div');
  typing.className = 'typing';
  typing.innerHTML = '<div class="typing-dot"></div><div class="typing-dot"></div><div class="typing-dot"></div>';
  msgs.appendChild(typing);
  msgs.scrollTop = msgs.scrollHeight;
  setTimeout(() => {
    typing.remove();
    const aiMsg = document.createElement('div');
    aiMsg.className = 'msg msg-ai';
    aiMsg.innerHTML = aiResponses[aiIdx % aiResponses.length];
    aiIdx++;
    msgs.appendChild(aiMsg);
    msgs.scrollTop = msgs.scrollHeight;
  }, 900 + Math.random() * 600);
}

// ── SAVE PROFILE ──
function saveProfile() {
  const first = document.getElementById('firstName').value;
  const last = document.getElementById('lastName').value;
  document.querySelector('.profile-name').textContent = first + ' ' + last;
  document.querySelector('.user-name').textContent = first + ' ' + last;
  showToast('Profile saved successfully ✓', '');
}

// ── SIGN OUT ──
function handleSignOut(e) {
  e.preventDefault();
  if (confirm('Sign out of KindMap?')) showToast('Signed out. See you soon! 👋', '');
}

// ── LIVE FEED TICKER ──
const feedPool = [
  {color:'#4a7d5e',init:'S',text:'<strong>Souvik M.</strong> just signed up for the tree plantation at Dhakuria<span class="feed-action">+150 pts</span>'},
  {color:'#9b4f3d',init:'K',text:'<strong>Kaveri N.</strong> completed the tutoring session in Behala<span class="feed-action">+100 pts</span>'},
  {color:'#7c6bb5',init:'D',text:'<strong>Deepa R.</strong> earned the 🌟 <strong>5-day Streak</strong> badge!'},
  {color:'#4a6b9b',init:'N',text:'<strong>Neel C.</strong> checked in at the meal drive in Tollygunge<span class="feed-action">+130 pts</span>'},
  {color:'#b05e35',init:'A',text:'<strong>Ananya B.</strong> saved the flood relief task for tomorrow'},
];
let feedIdx = 0;
setInterval(() => {
  const item = feedPool[feedIdx % feedPool.length];
  feedIdx++;
  addToFeed(item.color, item.init, item.text, 'Just now');
}, 18000);

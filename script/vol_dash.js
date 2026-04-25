
// ── Page navigation
function showPage(id, el) {
  document.querySelectorAll('.page').forEach(p => p.classList.remove('active'));
  document.querySelectorAll('.nav-item').forEach(n => n.classList.remove('active'));
  document.getElementById('page-' + id).classList.add('active');
  if (el) el.classList.add('active');
  const titles = {browse:'Browse tasks',mytasks:'My tasks',profile:'My profile',leaderboard:'Leaderboard'};
  document.getElementById('page-title').textContent = titles[id] || 'KindMap';
}

// ── Filter chips
function filterChip(chip) {
  document.querySelectorAll('.filter-chip').forEach(c => c.classList.remove('on'));
  chip.classList.add('on');
}

// ── Task save toggle
function toggleSave(btn) {
  btn.classList.toggle('saved');
  btn.textContent = btn.classList.contains('saved') ? '♥' : '♡';
}

// ── My tasks tab filter
function filterTasks(status, tab) {
  tab.closest('.tab-row').querySelectorAll('.tab').forEach(t => t.classList.remove('active'));
  tab.classList.add('active');
  document.querySelectorAll('.my-task').forEach(t => {
    t.style.display = (status === 'all' || t.dataset.status === status) ? 'flex' : 'none';
  });
}

// ── Check-in modal
let pendingPts = '0';
function openCheckin(name, loc, pts) {
  document.getElementById('modalTaskName').textContent = name;
  document.getElementById('modalTaskLoc').textContent = '📍 ' + loc;
  document.getElementById('modalTaskPts').textContent = '⭐ ' + pts + ' pts';
  pendingPts = pts;
  document.getElementById('modal').classList.add('open');
}
function closeCheckin() { document.getElementById('modal').classList.remove('open'); }
function confirmCheckin() {
  closeCheckin();
  showToast('Checked in! See you there 🎉', pendingPts);
}

// ── Toast
function showToast(msg, pts) {
  const t = document.getElementById('toast');
  document.getElementById('toastMsg').textContent = msg;
  const ptsEl = document.getElementById('toastPts');
  if (pts) { ptsEl.textContent = '+' + pts + ' pts'; ptsEl.style.display = 'inline'; }
  else { ptsEl.style.display = 'none'; }
  t.classList.add('show');
  setTimeout(() => t.classList.remove('show'), 3200);
}

// ── Animate bars on page load
function animateBars() {
  document.querySelectorAll('.task-fill').forEach(b => {
    const w = b.dataset.w;
    if (w) setTimeout(() => b.style.width = w + '%', 300);
  });
}
animateBars();

// ── Leaderboard full page
const leaders = [
  {name:'Priya Sharma',pts:1420,tasks:24,rank:1,av:'#4a7d5e',you:false},
  {name:'Rohit Sen',pts:1280,tasks:21,rank:2,av:'#7c6bb5',you:false},
  {name:'Meera Bose',pts:1100,tasks:19,rank:3,av:'#b05e35',you:false},
  {name:'Aniket Roy',pts:980,tasks:16,rank:4,av:'#3d6b4f',you:false},
  {name:'Tanisha Das',pts:920,tasks:15,rank:5,av:'#c9922a',you:false},
  {name:'Shalini Gupta',pts:870,tasks:13,rank:6,av:'#8d4f6b',you:false},
  {name:'Debashis Roy',pts:855,tasks:13,rank:7,av:'#4a6b9b',you:false},
  {name:'Arjun Das',pts:840,tasks:12,rank:14,av:'var(--sage)',you:true},
];
const medals = ['🥇','🥈','🥉'];
document.getElementById('lbFullList').innerHTML = leaders.map((l,i) => `
  <div class="lb-full-item ${l.you?'you':''}">
    <div class="lb-full-rank ${l.rank<=3?['gold','silver','bronze'][l.rank-1]:''}">${l.rank<=3?medals[l.rank-1]:l.rank}</div>
    <div class="lb-full-av" style="background:${l.av}">${l.name[0]}</div>
    <div class="lb-full-info">
      <div class="lb-full-name">${l.name}${l.you?' <span style="font-size:10px;background:var(--sage);color:#fff;padding:2px 7px;border-radius:100px;margin-left:6px">you</span>':''}</div>
      <div class="lb-full-tasks">${l.tasks} tasks completed</div>
    </div>
    <div class="lb-full-pts">⭐ ${l.pts.toLocaleString()}</div>
  </div>
`).join('');

// ── AI Chat
let chatOpen = false;
const chatPanel = document.getElementById('chatPanel');
function toggleChat() {
  chatOpen = !chatOpen;
  chatPanel.classList.toggle('open', chatOpen);
  chatPanel.parentElement.style.pointerEvents = chatOpen ? 'auto' : 'none';
  if (chatOpen) document.getElementById('chatInput').focus();
}

const aiResponses = {
  default: [
    "Based on your Teaching skill and Salt Lake location, I'd strongly recommend the <strong>digital literacy task at Park Street</strong> on Saturday. Only 4 of 10 slots filled — perfect timing! 📚",
    "You're 160 pts away from the next badge. The <strong>flood relief task tomorrow</strong> gives 200 pts and matches your logistics skill. Want me to sign you up?",
    "I found 3 tasks this weekend within 5 km of you with combined value of <strong>400 pts</strong>. Want the full breakdown?",
    "Looking at your availability (Sat/Sun evenings), the <strong>meal distribution drive</strong> at 9 AM Saturday is a great fit. Plus it's in Tollygunge — only 3.2 km away. 🗺️"
  ]
};
let aiIdx = 0;

function sendChatMsg(presetMsg) {
  const input = document.getElementById('chatInput');
  const msgs = document.getElementById('chatMsgs');
  const text = presetMsg || input.value.trim();
  if (!text) return;
  input.value = '';

  // Remove suggestions
  msgs.querySelectorAll('.msg-suggestion').forEach(s => s.remove());

  // User bubble
  const userMsg = document.createElement('div');
  userMsg.className = 'msg msg-user';
  userMsg.textContent = text;
  msgs.appendChild(userMsg);
  msgs.scrollTop = msgs.scrollHeight;

  // Typing indicator
  const typing = document.createElement('div');
  typing.className = 'typing';
  typing.innerHTML = '<div class="typing-dot"></div><div class="typing-dot"></div><div class="typing-dot"></div>';
  msgs.appendChild(typing);
  msgs.scrollTop = msgs.scrollHeight;

  setTimeout(() => {
    typing.remove();
    const aiMsg = document.createElement('div');
    aiMsg.className = 'msg msg-ai';
    aiMsg.innerHTML = aiResponses.default[aiIdx % aiResponses.default.length];
    aiIdx++;
    msgs.appendChild(aiMsg);
    msgs.scrollTop = msgs.scrollHeight;
  }, 1200);
}

// ── Live feed ticker (add a new item every 25s)
const feedItems = [
  {av:'#4a7d5e',init:'S',text:'<strong>Souvik M.</strong> just signed up for the tree plantation at Dhakuria <span class="feed-action">+150 pts</span>',time:'Just now'},
  {av:'#9b4f3d',init:'K',text:'<strong>Kaveri N.</strong> completed the tutoring session in Behala <span class="feed-action">+100 pts</span>',time:'Just now'},
];
let feedIdx = 0;
setInterval(() => {
  const fl = document.getElementById('feedList');
  if (!fl) return;
  const item = feedItems[feedIdx % feedItems.length];
  feedIdx++;
  const el = document.createElement('div');
  el.className = 'feed-item';
  el.style.animationDelay = '0s';
  el.innerHTML = `<div class="feed-av" style="background:${item.av}">${item.init}</div><div class="feed-content"><div class="feed-text">${item.text}</div><div class="feed-time">${item.time}</div></div>`;
  fl.insertBefore(el, fl.firstChild);
  if (fl.children.length > 6) fl.removeChild(fl.lastChild);
}, 25000);

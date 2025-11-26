// GLOBAL UTILITIES 

const qs = (sel, parent=document) => parent.querySelector(sel);
const qsa = (sel, parent=document) => [...parent.querySelectorAll(sel)];

const templater = f => a => a.map(f).join("");

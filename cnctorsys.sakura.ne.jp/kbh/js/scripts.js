'use strict';
// const now = new Date('');
// // const now = new Date('2024/08/01');

// const bus1 = document.querySelector('#bus1');
// const map4 = document.querySelector('#map4');
// const oldMap = document.querySelector('#old-map');

// const august = new Date('2024/08/01');
// if (august >= now) {
//   oldMap.style.display = 'none';
// } else {
//   bus1.style.display = 'none';
// }

let now = new Date();
const bannerContainer = document.querySelector('.banner-container');
const couponContainer = document.querySelector('.couponContainer');
const coupon1 = document.querySelector('#coupon1');
const coupon2 = document.querySelector('#coupon2');
const coupon3 = document.querySelector('#coupon3');
const coupon4 = document.querySelector('#coupon4');
const coupon5 = document.querySelector('#coupon5');
const coupon6 = document.querySelector('#coupon6');
const coupon7 = document.querySelector('#coupon7');

const startDate = new Date('2025/05/07 9:59:59');
const endDate = new Date('2025/05/09 19:59:59');
const endDate1 = new Date('2025/05/09 20:59:59');
const endDate2 = new Date('2025/05/09 23:59:59');
const endDate3 = new Date('2025/05/20 23:59:59');

// now = new Date('2025/05/21 10:00:00'); 

if (startDate < now && now < endDate) {
    coupon1.style.display = 'block';
    console.log('endDate');
}

if (startDate < now && now < endDate1) {
    coupon2.style.display = 'block';
    coupon3.style.display = 'block';
    console.log('endDate1');
}
if (startDate < now && now < endDate2) {
    coupon4.style.display = 'block';
    coupon5.style.display = 'block';
    console.log('endDate2');
}
if (startDate < now && now < endDate3) {
    coupon6.style.display = 'block';
    coupon7.style.display = 'block';
    console.log('endDate3');
}

const usu = document.querySelector('#usu')
const ss_plan = document.querySelector('#ss-plan')
const startDate_ss_plan = new Date('2025/03/04 19:59:59');
const endDate_ss_plan = new Date('2025/03/21 00:00:00');

if (startDate_ss_plan < now && now < endDate_ss_plan) {
    usu.style.display = 'none';
    ss_plan.style.display = 'block';
}
/** 
 * PJS
 * A minimalist javascript library for small works
 * 
 * @auth Monzurul Hasan
 * @since 8 Oct 2022
 * 
 */

"use-strict";
function $(selector, all) {
	all = typeof all !== undefined ? all : false;
	const self = {
		element: document.querySelectorAll(selector),
		getTagName: () => {
			var v, r;
			r = []
			for (v = 0; v < self.element.length; v++) {
				r[v] = self.element[v].tagName;
			}
			return r;
		},
		onClick: (callback) => {
			var v;
			for (v = 0; v < self.element.length; v++) {
				self.element[v].addEventListener('click', callback);
			}
		},
		on: (event, callback) => {
			var v;
			for (v = 0; v < self.element.length; v++) {
				self.element[v].addEventListener(event, callback);
			}
		},
		text: (value) => {
			var v, r;
			r = [];
			if (value == null) {
				for (v = 0; v < self.element.length; v++) {
					if (self.element.innerText) {
						r[v] = self.element[v].innerText;
					} else {
						r[v] = self.element[v].textContent;
					}
				}
			} else {
				for (v = 0; v < self.element.length; v++) {
					if (self.element.innerText) {
						self.element[v].innerText = value;
					} else {
						self.element[v].textContent = value;
					}
				}
			}
			return r;
		},
		html: (value) => {
			var v, r;
			r = [];
			if (value == null) {
				for (v = 0; v < self.element.length; v++) {
					r[v] = self.element[v].innerHTML;
				}
			} else {
				for (v = 0; v < self.element.length; v++) {
					self.element[v].innerHTML = value;
				}
			}
			return r;
		},
		getInputType: () => {
			var v, r;
			r = [];
			for (v = 0; v < self.element.length; v++) {
				r[v] = self.element[v].type;
			}
			return r;
		},
		setInputType: (value) => {
			var v, r;
			r = [];
			for (v = 0; v < self.element.length; v++) {
				self.element[v].type = value;
			}
		},
		setBgSrc: (value) => {
			var v;
			for (v = 0; v < self.element.length; v++) {
				self.element[v].style = `background-image: url(${value})`;
			}
		},
		getImgSrc: () => {
			var v, r;
			r = [];
			for (v = 0; v < self.element.length; v++) {
				r[v] = self.element[v].src;
			}
			return r;
		},
		setImgSrc: (value) => {
			var v;
			for (v = 0; v < self.element.length; v++) {
				self.element[v].src = value;
			}
		},
		getHref: () => {
			var v, r;
			r = [];
			for (v = 0; v < self.element.length; v++) {
				r[v] = self.element[v].href;
			}
			return r;
		},
		setHref: (value) => {
			var v;
		},
		focus: (number) => {
			var v, r, position;
			r = [];

			if (number == null) {
				position = 0;
			} else if (number <= self.element.length) {
				position = number;
			}

			self.element[position].focus();
		},
		blur: (number) => {
			var v, r, position;
			r = [];

			if (number == null) {
				position = 0;
			} else if (number <= self.element.length) {
				position = number;
			}

			self.element[position].blur();
		},
		addClass: (v) => {
			var c;
			for (c = 0; c < self.element.length; c++) {
				self.element[c].classList.add(v);
			}
		},
		removeClass: (v) => {
			var c;
			for (c = 0; c < self.element.length; c++) {
				self.element[c].classList.remove(v);
			}
		},
		toggleClass: (v) => {
			var c;
			for (c = 0; c < self.element.length; c++) {
				self.element[c].classList.toggle(v);
			}
		}
	}
	return self;
}
// Reusable functions
function isHidden(el) {
    var style = window.getComputedStyle(el);
    return (style.display === 'none')
}
if (!String.prototype.contains) {
    String.prototype.contains = function(s) {
        return this.indexOf(s) > -1
    }
}

document.addEventListener('DOMContentLoaded', function(){ 

	// Handle main navigation sub menu trigers
	var menuItems = document.getElementsByClassName("menu-item-has-children");
	for (i = 0; i < menuItems.length; i++) {
		var item = menuItems[i];
		item.onclick = function() {
			for (j = 0; j < menuItems.length; j++) {
				item = menuItems[j];
				if(item !== this) {
					item.classList.remove("open");
				}
			}
			if(this.classList.contains("open")) {
				this.classList.remove("open");
			} else {
				this.classList.add("open");
			}
		}
	}

	// Handle mobile menu open/close
	var mobMenuTrigger = document.getElementById("mobMenuTrigger");
	mobMenuTrigger.onclick = function() {
		var mainNav = document.getElementById("mainNav");
		if(isHidden(mainNav)){
			mainNav.style.display = 'block';
			mobMenuTrigger.classList.add("open");
		} else {
			mainNav.style.display = 'none';
			mobMenuTrigger.classList.remove("open");
		}
	};
}, false);
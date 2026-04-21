import Alpine from 'alpinejs';
import hljs from 'highlight.js'
import 'highlight.js/styles/xt256.css' // or any theme

window.hljs = hljs

window.Alpine = Alpine;

Alpine.start();

let themeToggleDarkIcon = document.getElementById("theme-toggle-dark-icon");
let themeToggleLightIcon = document.getElementById("theme-toggle-light-icon");

if (
    localStorage.getItem("theme") === "dark" ||
    (!("theme" in localStorage) &&
        window.matchMedia("(prefers-color-scheme: dark)").matches)
) {
    document.documentElement.classList.add("dark")
    themeToggleLightIcon.classList.remove("hidden");
} else {
    document.documentElement.classList.remove("dark")
    themeToggleDarkIcon.classList.remove("hidden");
}

let themeToggleBtn = document.getElementById("theme-toggle");

themeToggleBtn.addEventListener("click", function () {
    themeToggleDarkIcon.classList.toggle("hidden");
    themeToggleLightIcon.classList.toggle("hidden");

    if (localStorage.getItem("theme")) {
        if (localStorage.getItem("theme") === "light") {
            document.documentElement.classList.add("dark");
            document.documentElement.classList.remove("light");
            localStorage.setItem("theme", "dark");
        } else {
            document.documentElement.classList.remove("dark");
            document.documentElement.classList.add("light");
            localStorage.setItem("theme", "light");
        }
    } else {
        if (document.documentElement.classList.contains("dark")) {
            document.documentElement.classList.remove("dark");
            localStorage.setItem("theme", "light");
        } else {
            document.documentElement.classList.add("dark");
            localStorage.setItem("theme", "dark");
        }
    }
});


import EditorJS from '@editorjs/editorjs'
import Header from '@editorjs/header'
import List from '@editorjs/list'
import Code from '@editorjs/code'

const editor = new EditorJS({
    holder: 'editorjs',

    tools: {
        header: Header,
        list: List,
        code: Code,
    },

    async onChange() {
        const content = await editor.save()
        document.getElementById('content').value = JSON.stringify(content)
    }
})



document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('pre code').forEach((block) => {
        hljs.highlightElement(block)
    })
})
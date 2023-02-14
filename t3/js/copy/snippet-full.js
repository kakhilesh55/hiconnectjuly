var snippets = document.querySelectorAll(".snippet");
[].forEach.call(snippets, function (snippet) {
    snippet.firstChild.insertAdjacentHTML("beforebegin", '<button class="btnqxd" data-clipboard-snippet><img class="clippy" width="13" src="t3/css/images/copy-wallet.svg" alt="Copy to clipboard"></button>');
});
var clipboardSnippets = new ClipboardJS("[data-clipboard-snippet]", {
    target: function (trigger) {
        return trigger.nextElementSibling;
    },
});
clipboardSnippets.on("success", function (e) {
    e.clearSelection();
    showTooltip(e.trigger, "Copied!");
});
clipboardSnippets.on("error", function (e) {
    showTooltip(e.trigger, fallbackMessage(e.action));
});

////------------------------

var snippets1 = document.querySelectorAll(".snippet1");
[].forEach.call(snippets1, function (snippet1) {
    snippet1.firstChild.insertAdjacentHTML("beforebegin", '<button class="btnqxd" data-clipboard-snippet1><img class="clippy" width="13" src="t3/css/images/copy-urls.svg" alt="Copy to clipboard"></button>');
});
var clipboardSnippets1 = new ClipboardJS("[data-clipboard-snippet1]", {
    target: function (trigger) {
        return trigger.nextElementSibling;
    },
});
clipboardSnippets1.on("success", function (e) {
    e.clearSelection();
    showTooltip(e.trigger, "Copied!");
});
clipboardSnippets1.on("error", function (e) {
    showTooltip(e.trigger, fallbackMessage(e.action));
});

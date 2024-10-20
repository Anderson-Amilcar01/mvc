<footer>
    <div class="circle"></div>
    <div class="circle"></div>
    <div class="circle"><a href="index.php?action=index"><svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);"><path d="M3 13h1v7c0 1.103.897 2 2 2h12c1.103 0 2-.897 2-2v-7h1a1 1 0 0 0 .707-1.707l-9-9a.999.999 0 0 0-1.414 0l-9 9A1 1 0 0 0 3 13zm7 7v-5h4v5h-4zm2-15.586 6 6V15l.001 5H16v-5c0-1.103-.897-2-2-2h-4c-1.103 0-2 .897-2 2v5H6v-9.586l6-6z"></path></svg></a></div>
    <div class="circle"></div>
    <div class="circle"><a href="index.php?action=logout"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);"><path d="M16 13v-2H7V8l-5 4 5 4v-3z"></path><path d="M20 3h-9c-1.103 0-2 .897-2 2v4h2V5h9v14h-9v-4H9v4c0 1.103.897 2 2 2h9c1.103 0 2-.897 2-2V5c0-1.103-.897-2-2-2z"></path></svg></a></div>
</footer>
<style>
    footer {
        height: 10vh;
        background-color: #1D81F3;

        display: flex;
        justify-content: center;
        align-items: center;
        gap: 55px;
    }

    footer .circle {
        height: 55px;
        border-radius: 50%;
        background-color: #D9D9D9;
        width: 55px;
        cursor: pointer;

        transition: .5s;
    }

    footer .circle a {
        width: 100%;
        height: 100%;

        display: flex;
        align-items: center;
        justify-content: center;
    }

    footer .circle a svg {
        width: 60%;
        height: 60%;
    }

    footer .circle:hover {
        transform: translateY(-10px);
        transform: scale(1.20);
        cursor: pointer;

        transition: .5s;
    }
</style>
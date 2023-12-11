<footer class="footer">
    <div class="text-right">
        <p>{{ date('F Y') }} &copy; Imam Windharko</p>
    </div>
</footer>

<style>
    .footer {
        position: fixed;
        bottom: 0;
        right: 0;
        left: 0; /* Reset to default */
        background-color: rgba(248, 249, 250, 0.8);
        padding: 10px;
        border-top: 1px solid #ccc; /* Add a top border for separation */
        text-align: right;
    }
    
    .footer p {
        margin: 0; /* Remove default margin to prevent unwanted space */
    }
</style>
function getJournalEntries(userId) {
    fetch(`get_journals.php?user_id=${userId}`)
    .then(response => response.json())
    .then(entries => {
        entries.forEach(entry => {
            console.log(`Date: ${entry.entry_date}, Entry: ${entry.entry_text}`);
            // Display each entry in your frontend as needed
        });
    })
    .catch(error => console.error('Error:', error));
}


document.addEventListener('DOMContentLoaded', () => {
    const pokemonCards = document.querySelectorAll('.pokemon-card');
    
    pokemonCards.forEach(card => {
        card.addEventListener('click', () => {
            const types = card.dataset.types.split(',');
            alert(`Tipos de Pokémon: ${types.join(', ')}`);
        });
    });
});

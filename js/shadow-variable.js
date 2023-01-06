const articleList = []; // In a real app this list would be full of articles.
var kudos = 5;

/**
 * Méthode pour calculer le nombre de Kudos en fonction des kudos des articles
 */
function calculateTotalKudos(articles) {
  var kudos = 0;
  
  //On parcour la liste des articles
  // La liste comprend un objet article qui a un paramètre kudos
  for (let article of articles) {
    kudos += article.kudos;
  }
  
  return kudos;
}

// On écrit dans HTML le maximum de kudos possible et le nombre total de kudos par articles
document.write(`
  <p>Maximum kudos you can give to an article: ${kudos}</p>
  <p>Total Kudos already given across all articles: ${calculateTotalKudos(articleList)}</p>
`);

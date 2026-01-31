# Configuração das Avaliações do Google Meu Negócio

Para exibir avaliações do Google no site, adicione estas variáveis ao seu arquivo `.env`:

```env
GOOGLE_PLACE_ID=ChIJ9a5kHKPxXpMRPg6YLtknXw0
GOOGLE_PLACES_API_KEY=sua_api_key_aqui
```

- **GOOGLE_PLACE_ID**: Place ID da Clínica Bel Viso no Google Maps (já configurado)
- **GOOGLE_PLACES_API_KEY**: Chave da Places API (New) do Google Cloud

A API key pode ser criada em: https://console.cloud.google.com/apis/credentials  
Projeto recomendado: `vscode-nascidus` (Places API já habilitada)

**Cache**: As avaliações são cacheadas por 6 horas para reduzir requisições à API.

# Planejamento — Site Viveiro Mudar: conversão de lead para WhatsApp

> Documento de trabalho para o Claude Code implementar no site. Baseado na pesquisa de palavras-chave (Google Keyword Planner, ago/2026) e na auditoria do Perfil do Google feita antes. Ver contexto completo no histórico do chat com o Agente 7 (marketing) se precisar relembrar o porquê de cada decisão.

## Objetivo

Fazer o visitante do site chegar até um clique de WhatsApp, o mais rápido possível, com uma mensagem já qualificada (a mensagem pré-preenchida diz de onde ele veio e o que quer). WhatsApp é o canal de conversão principal do site — não formulário, não e-mail. Comprador B2B/B2G quer resposta rápida e prova de documentação (RENASEM, engenheiro florestal), não preencher formulário longo.

## Contexto resumido (pesquisa de keywords)

- Demanda de nicho: poucas buscas por mês, mas bem qualificadas. SEO aqui não traz volume, traz poucos leads certos.
- Melhor oportunidade: cluster de compensação florestal / PRAD / reserva legal — baixa concorrência, lance de anúncio alto (sinal de valor comercial).
- Segunda oportunidade: termos locais do Vale do Itajaí (Rio do Oeste, Laurentino, Corupá, Videira, Caçador, Agrolândia) — pouquíssima concorrência, comprador certo.
- Termo de maior volume com pouca concorrência: "árvores nativas" e "viveiro florestal".
- Licitação, RENASEM e pregão NÃO têm busca no Google — não adianta criar página nem anunciar nesses termos, esse comprador se acha em portal de licitação, não em busca.
- Não vale criar conteúdo sobre Cerrado, Caatinga, mudas frutíferas/exóticas — não é o bioma nem o público do negócio.

## Princípios de conversão

1. Botão de WhatsApp sempre visível, em toda página (fixo/flutuante), mobile e desktop.
2. Mensagem pré-preenchida diferente por página, para saber a origem do contato sem precisar perguntar.
3. CTA repetido mais de uma vez na página (topo e no fim), não só uma vez.
4. Prova perto do botão: RENASEM, engenheiro florestal responsável, nota fiscal, foto de entrega para prefeitura/empreiteira, nota 4.6 do Google.
5. Nunca usar formulário longo como conversão principal. Se existir formulário, ele é secundário ao WhatsApp.

## Páginas — o que criar ou editar, em ordem de prioridade

### 1. Botão flutuante de WhatsApp (site inteiro)
- Implementar primeiro, é rápido e afeta todas as páginas de uma vez.
- Fixo no canto inferior direito, visível em toda rolagem, mobile e desktop.
- Mensagem padrão (quando não há página específica): "Olá! Vim pelo site do Viveiro Mudar e queria saber mais sobre as mudas nativas."
- Confirmar com o usuário qual número de WhatsApp Business usar (o telefone do Perfil do Google é +55 47 98433-7854 — confirmar se é o mesmo do WhatsApp).

### 2. Home — ajustar
- Título principal (H1) precisa ter "árvores nativas" e/ou "viveiro florestal" — são os termos de maior volume com pouca concorrência.
- CTA de WhatsApp visível sem precisar rolar a página (acima da dobra).
- Mensagem pré-preenchida da home: "Olá! Vim pelo site do Viveiro Mudar e queria falar sobre mudas nativas."
- Adicionar bloco de prova logo abaixo do topo: RENASEM, engenheiro florestal responsável, atacado, frota própria.

### 3. Nova página — Compensação Florestal e PRAD (prioridade alta)
- URL sugerida: /compensacao-florestal ou /compensacao-ambiental-e-prad
- Conteúdo: o que é compensação florestal, reposição florestal obrigatória, o que é um PRAD, passo a passo de como a empresa/produtor regulariza a obrigação com mudas nativas.
- CTA de WhatsApp específico, mais de uma vez na página (logo após a introdução e no final).
- Mensagem pré-preenchida: "Olá! Tenho uma obrigação de compensação florestal/PRAD e queria saber como o Viveiro Mudar pode ajudar."
- Esta é a página com melhor chance de atrair comprador qualificado — capriche na prova técnica (engenheiro florestal responsável, RENASEM, exemplos de projetos já entregues).

### 4. Páginas locais — uma por cidade/região atendida (prioridade média)
- Cidades identificadas na pesquisa: Rio do Oeste, Laurentino, Corupá, Videira, Caçador, Agrolândia (Vale do Itajaí e Alto Vale).
- URL sugerida: /entrega/[cidade] (ex: /entrega/rio-do-oeste-sc)
- Cada página: título mencionando a cidade, texto curto sobre entrega/atendimento na região, CTA de WhatsApp.
- Mensagem pré-preenchida por cidade: "Olá! Sou de [Cidade] e queria saber sobre entrega de mudas nativas do Viveiro Mudar."
- Pode ser uma página só com seções por cidade, se for mais simples de implementar que páginas separadas — o importante é cada cidade ter seu próprio H1/texto para aparecer na busca local.

### 5. O que NÃO criar
- Nenhuma página sobre Cerrado, Caatinga, espécies exóticas ou mudas frutíferas — não é o público nem o bioma do negócio.
- Nenhuma página tentando rankear para "licitação", "RENASEM" ou "pregão" — não tem busca, não vale o esforço.

## Rastreamento (para saber o que está funcionando)

- Configurar evento de analytics (ex: GA4) disparado no clique do botão de WhatsApp, com um parâmetro dizendo de qual página veio o clique.
- Se possível, cada botão de WhatsApp deve ter um texto pré-preenchido diferente (ver acima) — isso já funciona como rastreamento manual: quando a mensagem chegar no WhatsApp, dá pra saber de qual página o lead veio só de ler a mensagem.

## Textos dos botões (copy)

- Home: "Falar com o Viveiro Mudar no WhatsApp"
- Página de compensação florestal: "Tirar dúvida sobre compensação florestal"
- Páginas de cidade: "Pedir orçamento de entrega em [Cidade]"
- Botão flutuante padrão (demais páginas): "Falar no WhatsApp"

## Ordem sugerida de implementação

1. Botão flutuante de WhatsApp no site inteiro
2. Ajustes na home (título + CTA + prova)
3. Página de Compensação Florestal e PRAD
4. Páginas locais por cidade
5. Configuração do evento de rastreamento de clique

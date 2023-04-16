# Trailermarine

João, como dar commit caso git easy não funcione:

- Abra o terminal do VS Code
- Verifique a branch que você se encontra digitando o comando "git branch"
- O comando irá retornar o seguinte:
  > git branch
  >* branch_atual (geralmente será main)
 - Adicione os arquivos modificados
 - git add . (adiciona TODOS os arquivos modificados)
 - Agora de o commit com o comando:
 - git commit -m "mensagem do commit"
 - Depois de entrar o comando ácima, você está pronto para empurrar os arquivos para sua branch
 - git push origin nome_da_branch (geralmente main)

Exemplo da branch "MAIN" do repositório TRAILERMARINE:

(entrada) git branch
(retorno) * main

(entrada) git add .

(entrada) git commit -m "pebus"
(retorno) pebus

(entrada) git push origin main

# WORDPRESS REFERENCES
Referências para Wordpress

## A TINY WORDPRESS BOILERPLATE
Arquivos para tema de Wordpress

### FILES || ARQUIVOS

#### /TEMPLATES

##### BLOG-SEARCH-BOX.PHP

select > option > Categories
  
select > option > Categorias
  
input > Search

input > Busca

##### LOOP-BLOG.PHP

The post loop

O loop do post

#### /

##### ARCHIVE.PHP

Search result page (tags, posts, search)

Resultado das buscas (tags, posts e buscas)

##### BLOG-PAGE.PHP

Page layout for blog page

Uma página home de blog 

##### FUNCTION.PHP

Global functions

Funções globais

##### SINGLE-FEATURED-POST.PHP

Another layout to an single post

Layout opcional para um post simples

##### SINGLE.PHP

Default single post layout

Post simples padrão


## ME

@BolonhaDev


```
wordpress:
  image: wordpress
  volumes:
    - .:/var/www/html
  links:
    - wordpress_db:mysql
  ports:
    - 8000:80
wordpress_db:
  image: mysql:5.7
  volumes:
    - db_data:/var/lib/mysql
  restart: always
  environment:
    MYSQL_ROOT_PASSWORD: root
    MYSQL_DATABASE: nudatabase
    MYSQL_USER: nuuser
    MYSQL_PASSWORD: zumbaLand1987*
phpmyadmin:
  image: corbinu/docker-phpmyadmin
  links:
    - wordpress_db:mysql
  environment:
    MYSQL_ROOT_PASSWORD: 12bolotas
    MYSQL_DATABASE: nudatabase
    MYSQL_USER: nuuser
    MYSQL_PASSWORD: zumbaLand1987*
  ports:
    - 1334:80
# Install WP plugins
# RUN curl -L https://downloads.wordpress.org/plugin/wp-super-cache.1.7.2.zip -o /tmp/wp-super-cache.1.7.2.zip
# RUN unzip /tmp/wp-super-cache.1.7.2.zip -d /usr/src/wordpress/wp-content/plugins
# RUN rm /tmp/wp-super-cache.1.7.2.zip

# RUN curl -L https://downloads.wordpress.org/plugin/advanced-custom-fields.5.7.7.zip -o /tmp/advanced-custom-fields.5.7.7.zip
# RUN unzip /tmp/advanced-custom-fields.5.7.7.zip -d /usr/src/wordpress/wp-content/plugins
# RUN rm /tmp/advanced-custom-fields.5.7.7.zip

# RUN curl -L https://downloads.wordpress.org/plugin/custom-post-type-ui.1.5.8.zip -o /tmp/custom-post-type-ui.1.5.8.zip
# RUN unzip /tmp/custom-post-type-ui.1.5.8.zip -d /usr/src/wordpress/wp-content/plugins
# RUN rm /tmp/custom-post-type-ui.1.5.8.zip

# RUN curl -L https://downloads.wordpress.org/plugin/learnpress.zip -o /tmp/learnpress.zip
# RUN unzip /tmp/learnpress.zip -d /usr/src/wordpress/wp-content/plugins
# RUN rm /tmp/learnpress.zip

# RUN curl -L https://downloads.wordpress.org/plugin/shins-pageload-magic.zip -o /tmp/shins-pageload-magic.zip
# RUN unzip /tmp/shins-pageload-magic.zip -d /usr/src/wordpress/wp-content/plugins
# RUN rm /tmp/shins-pageload-magic.zip

# RUN curl -L https://downloads.wordpress.org/plugin/wordpress-seo.15.9.2.zip -o /tmp/wordpress-seo.15.9.2.zip
# RUN unzip /tmp/wordpress-seo.15.9.2.zip -d /usr/src/wordpress/wp-content/plugins
# RUN rm /tmp/wordpress-seo.15.9.2.zip

# RUN curl -L https://downloads.wordpress.org/plugin/woocommerce.5.1.0.zip -o /tmp/woocommerce.5.1.0.zip
# RUN unzip /tmp/woocommerce.5.1.0.zip -d /usr/src/wordpress/wp-content/plugins
# RUN rm /tmp/woocommerce.5.1.0.zip

# RUN curl -L https://downloads.wordpress.org/plugin/contact-form-7.5.4.zip -o /tmp/contact-form-7.5.4.zip
# RUN unzip /tmp/contact-form-7.5.4.zip -d /usr/src/wordpress/wp-content/plugins
# RUN rm /tmp/contact-form-7.5.4.zip

# RUN curl -L https://downloads.wordpress.org/plugin/autoptimize.2.8.1.zip -o /tmp/autoptimize.2.8.1.zip
# RUN unzip /tmp/autoptimize.2.8.1.zip -d /usr/src/wordpress/wp-content/plugins
# RUN rm /tmp/autoptimize.2.8.1.zip

# RUN curl -L https://downloads.wordpress.org/plugin/async-javascript.2.20.12.09.zip -o /tmp/async-javascript.2.20.12.09.zip
# RUN unzip /tmp/async-javascript.2.20.12.09.zip -d /usr/src/wordpress/wp-content/plugins
# RUN rm /tmp/async-javascript.2.20.12.09.zip

```

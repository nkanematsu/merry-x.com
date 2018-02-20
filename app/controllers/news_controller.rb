class NewsController < ApplicationController
    def index
        @articles = Article.where(published: true).order(created_at: 'desc')
    end
end
